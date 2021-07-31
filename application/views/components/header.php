<?php 
/**
 * FOR DOCUMENTATION PURPOSE ONLY.
 * 
 * This file requires input variables:
 * 
 * $this->load->view('components/header', array(...example below));
 * 
 * array(
 *  'title' => 'Main Title',
 *  'description' => 'Main Description',
 *  'url' => 'Current Link Here',
 *  'keywords' => 'Keywords Details',
 *  'meta' => array(
 *    'title' => 'Custom Meta Title',
 *    'description' => 'Custom Meta Description',
 *    'image' => 'path/to/thumb/image'
 *  ),
 *  'styles' => 'Consolidated Content of CSS (For pagespeed we directly embed the CSS)',
 *  'favicon' (OPTIONAL) => 'path/to/icon'
 * ); 
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- PAGE MAIN DETAILS -->
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <link rel="canonical" href="<?php echo $url; ?>" />

    <!-- STANDARD HTML PAGE CONFIGURATION -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo isset($favicon) ? $favicon : DOF_IMG_URL . 'favicon.ico'; ?>" />
    <link rel="apple-touch-icon" href="<?php echo isset($favicon) ? $favicon : DOF_IMG_URL . 'favicon.ico'; ?>" />

    <!-- OPEN-GRAPH META DETAILS -->
    <meta name="og:type" content="website" />
    <meta name="og:url" content="<?php echo $url; ?>" />
    <meta name="og:title" content="<?php echo $meta['title']; ?>" />
    <meta name="og:image" content="<?php echo $meta['image']; ?>" />
    <meta name="og:description" content="<?php echo $meta['description']; ?>" />

    <!-- TWITTER META DETAILS -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $meta['title']; ?>" />
    <meta name="twitter:description" content="<?php echo $meta['description']; ?>" />
    <meta name="twitter:image" content="<?php echo $meta['image']; ?>" />

    <!-- APPLICATION JSON LD -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "website",
        "url": "<?php echo $url; ?>",
        "name": "<?php echo $title; ?>",
        "description": "<?php echo $description; ?>"
        "image": "<?php echo $meta['image']; ?>"
    }
    </script>
    <?php $this->load->view('components/fonts'); ?>
    
    <?php foreach ($styles as $key => $style): ?>
        <?php if (is_string($style)): ?>
            <?php $this->load->view($style); ?>
        <?php else: ?>
            <?php $this->load->view($key, $style); ?>
        <?php endif; ?>
    <?php endforeach; ?>
</head>
<body data-scroll-animation="true">
<div class="content-wrapper">
    <!-- <div class="loading">
        <img src="<?php echo DOF_IMG_URL . 'loader.svg'; ?>"/>
    </div> -->

    <!-- <div class="row"> -->