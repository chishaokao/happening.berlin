<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="generator" content="SuperHi">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>happening berlin</title>
  <?= css([
  "assets/css/templates/_base.css",
  "assets/css/templates/style.css",
  ]) ?>
  <?= js([
  "assets/js/jquery.min.js",
  "assets/js/script.js",
  "assets/js/blotter.js",
  "assets/js/jquery.ripples-min.js",
  "assets/js/liquiddistortmaterial.js",
  "assets/js/isotope.pkgd.min.js",
]) ?>
	

</head>

