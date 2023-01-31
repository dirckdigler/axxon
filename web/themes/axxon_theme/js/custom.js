/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';
  Drupal.behaviors.axxonChallenge = {
    attach: function (context, settings) {
      $("#block-axxon-theme-content", context)
        .once("axxonChallenge")
        .each(function() {
          $('.field--name-body').append(
            $(document.createElement('button')).prop({
              type: 'button',
              innerHTML: 'Press me',
              class: 'btn-styled button-axxon',
            })
          );
          $('.button-axxon').on("click", function() {
            alert(drupalSettings.axxon.siteName);
          });
        })
    }
  };

})(jQuery, Drupal);


