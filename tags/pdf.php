<?php
/*
 * Kirby 2 PDF tag
 * Embed PDFs in the content
 *
 * copyright: Robert | https://robert.katzki.de | robert@katzki.de
 * license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License
 */

kirbytext::$tags['pdf'] = [
  'attr' => array(
    'class'
  ),
  'html' => function($tag) {
    $file = $tag->file($tag->attr('pdf'));
    $object = '';
    if($file && $file->mime() === 'application/pdf') {
      $fileUrl = $file->url();
      $class = $tag->attr('class', 'pdf');

      $object = brick('object');
      $object->addClass($class);
      $object->attr('data', $fileUrl);
      $object->attr('type', $file->mime());

      $download = brick('a',
        c::get('pdf.fallback_action', 'Download PDF'),
        [
          'href' => $fileUrl,
          'title' => c::get('pdf.fallback_action', 'Download PDF'),
          'target' => '_blank'
        ]
      );

      $fallback = brick('p',
        c::get('pdf.fallback', 'This browser doesn’t support PDFs. Please download the PDF to view it:'). ' ' . $download . '.'
      );

      $object->append($fallback);

      }
      return $object;
  }
];
