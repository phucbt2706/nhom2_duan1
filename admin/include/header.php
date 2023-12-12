<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="<?= $ASSETS_URL ?>/" data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    
    <title>ADMIN</title>

    <meta name="description" content="" />
    <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
          'gtm.start':
              new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
              'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');</script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= $ASSETS_URL ?>/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/fonts/flag-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/css/rtl/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/quill/typography.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/quill/katex.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/quill/editor.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/select2/select2.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/dropzone/dropzone.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/flatpickr/flatpickr.css">
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/tagify/tagify.css">
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="<?= $ASSETS_URL ?>/vendor/js/helpers.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <script src="<?= $ASSETS_URL ?>/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= $ASSETS_URL ?>/js/config.js"></script>
    
    <!-- <script type="text/javascript" src="https://a.omappapi.com/app/js/api.min.js" async="" data-user="252882" data-account="269977"></script> -->
    <!-- <script async="" src="https://script.hotjar.com/modules.28e3191d8757c557b4b7.js" charset="utf-8"></script> -->
    <!-- <link rel="stylesheet" href="https://a.omappapi.com/app/js/api.min.css" id="omapi-css" media="all"> -->
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
       <?php require 'aside-menu.php';?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php require 'navbar.php';?>
          
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">