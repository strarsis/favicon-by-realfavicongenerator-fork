<?php
// Copyright 2014-2016 RealFaviconGenerator

define( 'RFG_PACKAGE_URL',                  'package_url' );
define( 'RFG_COMPRESSION',                  'compression' );
define( 'RFG_HTML_CODE',                    'html_code' );
define( 'RFG_FILES_URLS',                   'files_url' );
define( 'RFG_FILES_IN_ROOT',                'files_in_root' );
define( 'RFG_FILES_PATH',                   'files_path' );
define( 'RFG_PREVIEW_PICTURE_URL',          'preview_picture_url' );
define( 'RFG_CUSTOM_PARAMETER',             'custom_parameter' );
define( 'RFG_VERSION',                      'version' );
define( 'RFG_NON_INTERACTIVE_API_REQUEST',  'non_interactive_api_request' );

define( 'RFG_FAVICON_PRODUCTION_PACKAGE_PATH',   'favicon_production_package_path' );
define( 'RFG_FAVICON_COMPRESSED_PACKAGE_PATH',   'favicon_compressed_package_path' );
define( 'RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH', 'favicon_uncompressed_package_path' );
define( 'RFG_PREVIEW_PATH',                      'preview_path' );

class Favicon_By_RealFaviconGenerator_Api_Response {

	private $params = array();

	public function __construct( $json ) {
		if ( $json == NULL ) {
			throw new InvalidArgumentException( "No response from RealFaviconGenerator" );
		}

		$response = json_decode( $json, true );

		if ( $response == NULL ) {
			throw new InvalidArgumentException( "JSON could not be parsed" );
		}

		$response = $this->getParam( $response, 'favicon_generation_result' );
		$result = $this->getParam( $response, 'result' );
		$status = $this->getParam( $result, 'status' );

		if ( $status != 'success' ) {
			$msg = $this->getParam( $result, 'error_message', false );
			$msg = $msg != NULL ? $msg : 'An error occured';
			throw new InvalidArgumentException( $msg );
		}

		$favicon = $this->getParam( $response, 'favicon' );
		$this->params[RFG_PACKAGE_URL] = $this->getParam( $favicon, 'package_url' );
		$this->params[RFG_COMPRESSION] = $this->getParam( $favicon, 'compression' ) == 'true';
		$this->params[RFG_HTML_CODE] = $this->getParam( $favicon, 'html_code' );
		$this->params[RFG_FILES_URLS] = $this->getParam( $favicon, 'files_urls' );

		$filesLoc = $this->getParam( $response, 'files_location' );
		$this->params[RFG_FILES_IN_ROOT] = $this->getParam( $filesLoc, 'type' ) == 'root';
		$this->params[RFG_FILES_PATH] = $this->params[RFG_FILES_IN_ROOT] ? '/' : $this->getParam( $filesLoc, 'path' );

		$this->params[RFG_PREVIEW_PICTURE_URL] = $this->getParam( $response, 'preview_picture_url', false );

		$this->params[RFG_CUSTOM_PARAMETER] = $this->getParam( $response, 'custom_parameter', false );
		$this->params[RFG_VERSION] = $this->getParam($response, 'version', false );

		$this->params[RFG_NON_INTERACTIVE_API_REQUEST] = $this->getParam($response, 'non_interactive_request', false );
    }

	/**
	 * For example: <code>"http://realfavicongenerator.net/files/1234f5d2s34f3ds2/package.zip"</code>
	 */
	public function getPackageUrl() {
		return $this->params[RFG_PACKAGE_URL];
	}

	/**
	 * For example: <code>array( "http://realfavicongenerator.net/files/1234f5d2s34f3ds2/apple-touch-icon.png", ... )</code>
	 */
	public function getFilesURLs() {
		return $this->params[RFG_FILES_URLS];
	}

	/**
	 * For example: <code>"&lt;link ..."</code>
	 */
	public function getHtmlCode() {
		return $this->params[RFG_HTML_CODE];
	}

	/**
	 * <code>true</code> if the user chose to compress the pictures, <code>false</code> otherwise.
	 */
	public function isCompressed() {
		return $this->params[RFG_COMPRESSION];
	}

	/**
	 * <code>true</code> if the favicon files are to be stored in the root directory of the target web site, <code>false</code> otherwise.
	 */
	public function isFilesInRoot() {
		return $this->params[RFG_FILES_IN_ROOT];
	}

	/**
	 * Indicate where the favicon files should be stored in the target web site. For example: <code>"/"</code>, <code>"/path/to/icons"</code>.
	 */
	public function getFilesLocation() {
		return $this->params[RFG_FILES_PATH];
	}

	/**
	 * For example: <code>"http://realfavicongenerator.net/files/1234f5d2s34f3ds2/preview.png"</code>
	 */
	public function getPreviewUrl() {
		return $this->params[RFG_PREVIEW_PICTURE_URL];
	}

	/**
	 * Return the customer parameter, as it was transmitted during the invocation of the API.
	 */
	public function getCustomParameter() {
		return $this->params[RFG_CUSTOM_PARAMETER];
	}

	/**
	 * Return version of RealFaviconGenerator used to generate the favicon. Save this value to later check for updates.
	 */
	public function getVersion() {
		return $this->params[RFG_VERSION];
	}

	/**
	 * Return the non-interactive API request that matches the current interactive request.
	 */
	public function getNonInteractiveAPIRequest() {
		return $this->params[RFG_NON_INTERACTIVE_API_REQUEST];
	}

	private function getParam( $params, $paramName, $throwIfNotFound = true ) {
		if ( isset( $params[$paramName] ) ) {
			return $params[$paramName];
		}
		else if ( $throwIfNotFound ) {
			throw new InvalidArgumentException( "Cannot find parameter " . $paramName );
		}
	}

	/**
	 * Download and extract the files referenced by the response sent back by RealFaviconGenerator.
	 *
	 * Warning: as this method does HTTP accesses, calling it can take a few seconds. Better invoke it
	 * in an Ajax call, to not slow down the user experience.
	 */
	public function downloadAndUnpack( $outputDirectory = NULL ) {
		global $wp_filesystem;
		if ( $outputDirectory == NULL ) {
			$outputDirectory = get_temp_dir();
		}

		$outputDirectory = $this->append_directory_separator( $outputDirectory );

		if ( $this->getPackageUrl() != NULL ) {
			$extractedPath = $outputDirectory . 'favicon_package';
			if ( ! file_exists( $extractedPath ) ) {
				if ( mkdir( $extractedPath, 0755, true ) !== true ) {
					throw new InvalidArgumentException(
						sprintf( __( 'Cannot create directory %s to store the favicon package content', FBRFG_PLUGIN_SLUG), $extractedPath ) );
				}
			}

			try {
				$this->downloadZipFile( $outputDirectory, $extractedPath, $this->getPackageUrl() );
			}
			catch(Exception $e) {
				// Zip file download failed, try getting files directly
				$this->downloadFilesDirectly( $extractedPath, array() );
			}
		}

		if ( $this->getPreviewUrl() != NULL ) {
			$previewPath = $outputDirectory . 'favicon_preview.png';
			$this->downloadFile( $previewPath, $this->getPreviewUrl() );
			$this->params[RFG_PREVIEW_PATH] = $previewPath;
		}
	}

	public function downloadFilesDirectly( $outputDirectory, $filesURLs ) {
		foreach($this->getFilesURLs() as $fileURL ) {
			$parts = parse_url( $fileURL );
			$filePath = $outputDirectory . DIRECTORY_SEPARATOR .
				basename( $parts['path'] );
			$this->downloadFile( $filePath, $fileURL );
		}

		$this->params[RFG_FAVICON_PRODUCTION_PACKAGE_PATH] = $outputDirectory;
		if ( $this->isCompressed() ) {
			$this->params[RFG_FAVICON_COMPRESSED_PACKAGE_PATH]   = $extractedPath;
			$this->params[RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH] = NULL;
		}
		else {
			$this->params[RFG_FAVICON_COMPRESSED_PACKAGE_PATH]   = NULL;
			$this->params[RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH] = $extractedPath;
		}
	}

	public function downloadZipFile( $packageDirectory, $extractedPath, $packageUrl ) {
		$packagePath = $packageDirectory . 'favicon_package.zip';
		$this->downloadFile( $packagePath, $packageUrl );

		$ret = WP_Filesystem();
		$result = unzip_file( $packagePath, $extractedPath );
		if ( $result !== true ) {
			$explanation = ( is_wp_error( $result ) )
				? $result->get_error_message()
				: __( 'Unknown reason', Favicon_By_RealFaviconGenerator_Common::PLUGIN_SLUG );
			if ( get_class($wp_filesystem) != 'WP_Filesystem_Direct' ) {
				$explanation .= ' ' . __( "Apparently WordPress has no direct access to the file system (it uses another mean such as FTP). " .
					"This may be the root cause of this issue.", Favicon_By_RealFaviconGenerator_Common::PLUGIN_SLUG );
			}
			throw new InvalidArgumentException(
				sprintf( __( 'Error while unziping the favicon package %s to directory %s', Favicon_By_RealFaviconGenerator_Common::PLUGIN_SLUG ),
				$packagePath, $extractedPath ) . ': ' . $explanation );
		}

		if ( $this->isCompressed() ) {
			// As of today, when the user chooses the compress the picture,
			// the package is provided in two flavors, in two distinct directories.
			// Later, only the compressed version will be provided. Thus, the following code
			// handles both scenarios.
			if ( is_dir( $extractedPath . DIRECTORY_SEPARATOR . 'compressed' ) ) {
				$this->params[RFG_FAVICON_COMPRESSED_PACKAGE_PATH]   = $extractedPath .
					DIRECTORY_SEPARATOR . 'compressed';
			} else {
				$this->params[RFG_FAVICON_COMPRESSED_PACKAGE_PATH]   = $extractedPath;
			}

			if ( is_dir( $extractedPath . DIRECTORY_SEPARATOR . 'uncompressed' ) ) {
				$this->params[RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH] = $extractedPath .
					DIRECTORY_SEPARATOR . 'uncompressed';
			} else {
				$this->params[RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH] = $extractedPath;
			}

			$this->params[RFG_FAVICON_PRODUCTION_PACKAGE_PATH]   = $this->params[RFG_FAVICON_COMPRESSED_PACKAGE_PATH];
		}
		else {
			$this->params[RFG_FAVICON_COMPRESSED_PACKAGE_PATH]   = NULL;
			$this->params[RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH] = $extractedPath;
			$this->params[RFG_FAVICON_PRODUCTION_PACKAGE_PATH]   = $this->params[RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH];
		}
	}

 	/**
	 * Directory where the compressed files are stored. Method <code>downloadAndUnpack</code> must be called first in order to populate this field.
	 * Can be <code>NULL</code>.
	 */
 	public function getCompressedPackagePath() {
		return $this->params[RFG_FAVICON_COMPRESSED_PACKAGE_PATH];
	}

 	/**
	 * Directory where the uncompressed files are stored. Method <code>downloadAndUnpack</code> must be called first in order to populate this field.
	 * Can be <code>NULL</code>.
	 */
	public function getUncompressedPackagePath() {
		return $this->params[RFG_FAVICON_UNCOMPRESSED_PACKAGE_PATH];
	}

 	/**
	 * Directory where the production favicon files are stored.
	 * These are the files to deployed to the targeted web site. When the user asked for compression,
	 * this is the path to the compressed folder. Else, this is the path to the regular files folder.
	 * Method <code>downloadAndUnpack</code> must be called first in order to populate this field.
	 */
	public function getProductionPackagePath() {
		return $this->params[RFG_FAVICON_PRODUCTION_PACKAGE_PATH];
	}

	/**
	 * Path to the preview picture.
	 */
	public function getPreviewPath() {
		return $this->params[RFG_PREVIEW_PATH];
	}

	private function downloadFile( $localPath, $url ) {
		$resp = wp_remote_get( $url, array( 'filename' => $localPath, 'stream' => true ) );
		if ( ( $resp == NULL ) || ( $resp == false ) || ( is_wp_error( $resp ) ) || ( $resp['response'] == NULL ) ||
			 ( $resp['response']['code'] == NULL ) || ( $resp['response']['code'] != 200 ) ) {
			$explanation = is_wp_error( $resp ) ? ( ': ' . $resp->get_error_message() ) : '' ;
			throw new InvalidArgumentException(
				sprintf( __( 'Cannot download file at %s', Favicon_By_RealFaviconGenerator_Common::PLUGIN_SLUG ), $url ) . $explanation );
		}
		if ( ( ! file_exists( $localPath ) ) || ( filesize( $localPath ) <= 0 ) ) {
			throw new InvalidArgumentException( __( 'Cannot store downloaded file locally', Favicon_By_RealFaviconGenerator_Common::PLUGIN_SLUG ) );
		}
	}

	public function append_directory_separator( $filename ) {
		return $filename .
			( ( $this->ends_with( $filename, DIRECTORY_SEPARATOR ))
				? ''
				: DIRECTORY_SEPARATOR );
	}

	// See http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php#answer-10473026
	public function ends_with( $haystack, $needle ) {
		return $needle === "" ||
			( ( $temp = strlen( $haystack ) - strlen( $needle ) ) >= 0
				&& strpos( $haystack, $needle, $temp ) !== false );
	}

}
