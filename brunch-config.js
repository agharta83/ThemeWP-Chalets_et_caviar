exports.files = {
    javascripts: {
      joinTo: {
        'js/app.js': /^app/,
        'js/vendor.js': /^node_modules/
      }
    },
    stylesheets: {
      joinTo: {
        // Contiendra tous les fichiers CSS / SCSS de app
        'css/app.css': /^app/,
        // Contiendra tous les fichiers CSS de node-modules
        'css/vendor.css': /^node_modules/
      }
    }
};
  
exports.plugins = {
    copycat: {
      "fonts": ["node_modules/font-awesome/fonts"]
    },
};
  
exports.npm = {
  enabled: true,
  globals: {
    $: 'jquery',
    jQuery: 'jquery'
  },
  styles: {
    // Je récupére mes CSS depuis node_modules
    "normalize.css": ["normalize.css "],
    "font-awesome": ["css/font-awesome.css"]
  }
};

exports.modules = {
  autoRequire: {
    'js/app.js' : ['initialize']
  }
}

exports.watcher = {
  usePolling: true,
  awaitWriteFinish: true
};