if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.iconbuttons = function()
{
  return {
    init: function()
    {
      this.iconbuttons.addButtonIcons();
    },

    addButtonIcons: function()
    {
      var iconFile = RedactorIconButtons.config.iconFile;
      var iconMapping = RedactorIconButtons.config.iconMapping;

      setTimeout($.proxy(function() {
        $.each(this.button.all(), $.proxy(function(i, s) {
            var key = $(s).attr('rel');
            var btn = this.button.get(key);

            if (iconMapping !== null) {
              var iconId = (key in iconMapping && iconMapping[key] !== null) ? iconMapping[key] : null;
            } else {
              var iconId = key;
            }

            if (iconId !== null) {
              this.button.setIcon(btn, this.iconbuttons.getIconHtml(iconFile+'#'+iconId));
            }
        }, this));
      }, this), 0);
    },

    getIconHtml: function(url)
    {
      return '<svg class="re-button-icon">' +
        '<use xlink:href="'+url+'"></use>' +
        '</svg>';
    },
  };
};
