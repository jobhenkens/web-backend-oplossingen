    /**
           * Build a set of "<link>" elements for the stylesheets specified in the $this->styles array.
       * These will be applied to various media & IE conditionals.
  *
      * @return string
     */
  	public function buildCssLinks() {
          global $wgUseSiteCss, $wgAllowUserCss, $wgAllowUserCssPrefs, $wgContLang;
  
          $this->getSkin()->setupSkinUserCss( $this );
  
          // Add ResourceLoader styles
          // Split the styles into four groups
          $styles = array( 'other' => array(), 'user' => array(), 'site' => array(), 'private' => array(), 'noscript' => array() );
          $otherTags = ''; // Tags to append after the normal <link> tags
          $resourceLoader = $this->getResourceLoader();
  
          $moduleStyles = $this->getModuleStyles();
  
          // Per-site custom styles
          if ( $wgUseSiteCss ) {
              $moduleStyles[] = 'site';
              $moduleStyles[] = 'noscript';
              if ( $this->getUser()->isLoggedIn() ) {
                  $moduleStyles[] = 'user.groups';
              }
          }
  
          // Per-user custom styles
          if ( $wgAllowUserCss ) {
              if ( $this->getTitle()->isCssSubpage() && $this->userCanPreview() ) {
                  // We're on a preview of a CSS subpage
                  // Exclude this page from the user module in case it's in there (bug 26283)
                  $otherTags .= $this->makeResourceLoaderLink( 'user', ResourceLoaderModule::TYPE_STYLES, false,
                      array( 'excludepage' => $this->getTitle()->getPrefixedDBkey() )
                  );
  
                  // Load the previewed CSS
                  // If needed, Janus it first. This is user-supplied CSS, so it's
                  // assumed to be right for the content language directionality.
                  $previewedCSS = $this->getRequest()->getText( 'wpTextbox1' );
                  if ( $this->getLanguage()->getDir() !== $wgContLang->getDir() ) {
                      $previewedCSS = CSSJanus::transform( $previewedCSS, true, false );
                  }
                  $otherTags .= Html::inlineStyle( $previewedCSS );
              } else {
                  // Load the user styles normally
                  $moduleStyles[] = 'user';
              }
          }
  
          // Per-user preference styles
          if ( $wgAllowUserCssPrefs ) {
              $moduleStyles[] = 'user.cssprefs';
          }
  
          foreach ( $moduleStyles as $name ) {
              $module = $resourceLoader->getModule( $name );
              if ( !$module ) {
                  continue;
              }
              $group = $module->getGroup();
              // Modules in groups named "other" or anything different than "user", "site" or "private"
              // will be placed in the "other" group
              $styles[isset( $styles[$group] ) ? $group : 'other'][] = $name;
          }
  
          // We want site, private and user styles to override dynamically added styles from modules, but we want
          // dynamically added styles to override statically added styles from other modules. So the order
          // has to be other, dynamic, site, private, user
          // Add statically added styles for other modules
          $ret = $this->makeResourceLoaderLink( $styles['other'], ResourceLoaderModule::TYPE_STYLES );
      // Add normal styles added through addStyle()/addInlineStyle() here
      $ret .= implode( "\n", $this->buildCssLinksArray() ) . $this->mInlineStyles;
      // Add marker tag to mark the place where the client-side loader should inject dynamic styles
      // We use a <meta> tag with a made-up name for this because that's valid HTML
      $ret .= Html::element( 'meta', array( 'name' => 'ResourceLoaderDynamicStyles', 'content' => '' ) ) . "\n";
      // Add site, private and user styles
      // 'private' at present only contains user.options, so put that before 'user'
      // Any future private modules will likely have a similar user-specific character
      foreach ( array( 'site', 'noscript', 'private', 'user' ) as $group ) {
          $ret .= $this->makeResourceLoaderLink( $styles[$group],
                  ResourceLoaderModule::TYPE_STYLES
          );
      }
          // Add stuff in $otherTags (previewed user CSS if applicable)
          $ret .= $otherTags;
          return $ret;
      }
  
    