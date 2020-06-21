/**
 * Elementor Document Settings
 * Live Preview & Editing
 */
jQuery(window).on('elementor/frontend/init', function () {

  /**
   * Version Compare
   */
  function compareVersion(v1, v2) {
    if (typeof v1 !== 'string') return false;
    if (typeof v2 !== 'string') return false;
    v1 = v1.split('.');
    v2 = v2.split('.');
    const k = Math.min(v1.length, v2.length);
    for (let i = 0; i < k; ++i) {
      v1[i] = parseInt(v1[i], 10);
      v2[i] = parseInt(v2[i], 10);
      if (v1[i] > v2[i]) return 1;
      if (v1[i] < v2[i]) return -1;
    }
    return v1.length == v2.length ? 0 : (v1.length < v2.length ? -1 : 1);
  }

  /**
   * Reload Preveiw & Open Panel
   */
  function updatePreview(openedPageAfter, openedTabAfter, openedSectionAfter) {
    elementor.reloadPreview();
    elementor.once('preview:loaded', () => {
      if (openedPageAfter) {
        elementor.getPanelView().setPage(openedPageAfter);
      }

      if (openedTabAfter) {
        elementor.getPanelView().getCurrentPageView().activeTab = openedTabAfter;
      }

      if (openedSectionAfter) {
        elementor.getPanelView().getCurrentPageView().activateSection(openedSectionAfter);
      }

      elementor.getPanelView().getCurrentPageView().render();
    });
  }

  /**
   * Reload Elementor Preview
   */
  function reloadPreview(openedPageAfter, openedTabAfter, openedSectionAfter) {

    // Backward Compatibility for Elementor 2.8.5 or earlier
    if (compareVersion(elementor.config.version, '2.9.0') <= 0) {
      elementor.saver.update({
        onSuccess: () => {
          updatePreview(openedPageAfter, openedTabAfter, openedSectionAfter);
        }
      });
    } else {
      elementor.saver.update().then(() => {
        updatePreview(openedPageAfter, openedTabAfter, openedSectionAfter)
      });
    }

  }

  var colorThemesLight = [
    'bg-white',
    'bg-light',
    'bg-light-grey',
    'bg-blue-grey',
    'bg-blue-grey-dark'
  ];

  var colorThemesDark = [
    'bg-black',
    'bg-dark',
    'bg-dark-2'
  ];

  var
    $masthead = jQuery('.section-masthead'),
    $mastheadInner = $masthead.find('.section-masthead__inner'),
    $mastheadHeader = $masthead.find('.section-masthead__header'),
    $mastheadBackground = $masthead.find('.section-masthead__background'),
    $mastheadProperties = $masthead.find('.section-masthead__properties'),
    $mastheadOverlay = $masthead.find('.section-masthead__overlay');

  /**
   * Page Main Color Theme
   */
  elementor.settings.page.addChangeCallback('page_main_color_theme', function (newval) {

    window.$pageWrapper.removeClass(colorThemesLight.join(' ')).removeClass(colorThemesDark.join(' ')).addClass(newval);

    if (jQuery.inArray(newval, colorThemesDark) > -1) {
      window.$header.addClass('header_white');
      window.$pageWrapper.addClass('color-white').attr('data-barba-namespace', 'dark');
    } else {
      window.$header.removeClass('header_white');
      window.$pageWrapper.removeClass('color-white').attr('data-barba-namespace', 'light')
    }

  });

  /**
   * Page Masthead Layout
   */
  elementor.settings.page.addChangeCallback('page_masthead_layout', function (newval) {

    var classContent = elementor.settings.page.model.attributes.page_masthead_alignment;
    var classBackground = elementor.settings.page.model.attributes.page_masthead_image_layout;
    var classProperties;

    switch (classContent) {
      case 'text-left':
        classProperties = ' justify-content-lg-start ';
        break;
      case 'text-center':
        classProperties = ' justify-content-lg-center ';
        break;
      case 'text-right':
        classProperties = ' justify-content-lg-end ';
        break;
    }

    switch (newval) {
      case 'content_top': {
        $masthead.attr('class', 'section section-masthead section_pt');
        $mastheadInner.attr('class', 'section-masthead__inner');
        $mastheadBackground.attr('class', 'section section-masthead__background section-masthead__background_bottom ' + classBackground);
        $mastheadProperties.attr('class', 'row section-masthead__properties ' + classProperties + classContent);
        $mastheadOverlay.attr('class', 'overlay overlay_dark section-masthead__overlay d-none');
        $mastheadHeader.attr('class', 'row section-masthead__header ' + classContent);
        break;
      }
      case 'halfscreen_content_left': {
        $masthead.attr('class', 'section section-masthead section-masthead_fullheight section-fullheight section-masthead_fullheight-halfscreen');
        $mastheadInner.attr('class', 'section-masthead__inner section-fullheight__inner');
        $mastheadBackground.attr('class', 'section section-masthead__background section-masthead__background_fullscreen');
        $mastheadProperties.attr('class', 'row section-masthead__properties section-masthead__properties_bottom' + classProperties + classContent);
        $mastheadOverlay.attr('class', 'overlay overlay_dark section-masthead__overlay d-none');
        $mastheadHeader.attr('class', 'row section-masthead__header ' + classContent);
        break;
      }
      case 'halfscreen_content_right': {
        $masthead.attr('class', 'section section-masthead section-masthead_fullheight section-fullheight section-masthead_fullheight-halfscreen section-masthead_fullheight-halfscreen-reverse');
        $mastheadInner.attr('class', 'section-masthead__inner section-fullheight__inner');
        $mastheadBackground.attr('class', 'section section-masthead__background section-masthead__background_fullscreen');
        $mastheadProperties.attr('class', 'row section-masthead__properties section-masthead__properties_bottom ' + classProperties + classContent);
        $mastheadOverlay.attr('class', 'overlay overlay_dark section-masthead__overlay d-none');
        $mastheadHeader.attr('class', 'row section-masthead__header ' + classContent);
        break;
      }
      case 'fullscreen': {
        $masthead.attr('class', 'section section-masthead section-masthead_fullheight section-fullheight color-white');
        $mastheadInner.attr('class', 'section-masthead__inner section-fullheight__inner');
        $mastheadBackground.attr('class', 'section section-masthead__background section-masthead__background_fullscreen');
        $mastheadProperties.attr('class', 'row section-masthead__properties section-masthead__properties_bottom ' + classProperties + classContent);
        $mastheadOverlay.attr('class', 'overlay overlay_dark section-masthead__overlay');
        $mastheadHeader.attr('class', 'row section-masthead__header ' + classContent);
        break;
      }
    }

  });


  /**
   * Page Masthead Image Alignment
   */
  elementor.settings.page.addChangeCallback('page_masthead_image_layout', function (newval) {
    $mastheadBackground.removeClass('section_w-container-left section_w-container-right container section').addClass(newval);
  });

  /**
   * Page Masthead Content Alignment
   */
  elementor.settings.page.addChangeCallback('page_masthead_alignment', function (newval) {

    var classProperties;

    $mastheadHeader.attr('class', 'row section-masthead__header ' + newval);

    $mastheadProperties.removeClass('justify-content-lg-start justify-content-lg-center justify-content-lg-end text-left text-center text-right');

    switch (newval) {
      case 'text-left':
        classProperties = ' justify-content-lg-start text-left';
        break;
      case 'text-center':
        classProperties = ' justify-content-lg-center text-center';
        break;
      case 'text-right':
        classProperties = ' justify-content-lg-end text-right';
        break;
    }

    $mastheadProperties.addClass(classProperties);

  });

  /**
   * Menu Style
   */
  elementor.settings.page.addChangeCallback('page_menu_style', function (newval) {
    reloadPreview('page_settings', 'settings', 'header_section');
  });

  /**
   * Page Footer
   */
  elementor.settings.page.addChangeCallback('page_footer_settings', function (newval) {
    reloadPreview('page_settings', 'settings', 'footer_section');
  });

  /**
   * Hide Footer
   */
  elementor.settings.page.addChangeCallback('page_footer_hide', function (newval) {
    reloadPreview('page_settings', 'settings', 'footer_section');
  });

});
