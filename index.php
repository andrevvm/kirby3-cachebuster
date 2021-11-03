<?php

defined('DS') or define('DS', '/');

Kirby::plugin('schnti/cachebuster', [
	'options'    => [
		'active' => true
	],
	'components' => [
		'css' => function ($kirby, $url) {

			if ($kirby->option('schnti.cachebuster.active')) {

				$file = $kirby->roots()->index() . DS . $url;
				return dirname($url) . '/' . F::name($url) . '.css?v=' . F::modified($file);

			} else {
				return $url;
			}
		},
		'js'  => function ($kirby, $url) {

			if ($kirby->option('schnti.cachebuster.active')) {

				$file = $kirby->roots()->index() . DS . $url;
				return dirname($url) . '/' . F::name($url) . '.js?v=' . F::modified($file);

			} else {
				return $url;
			}
		}
	]
]);
