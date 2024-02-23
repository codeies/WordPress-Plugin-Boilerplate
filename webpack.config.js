const defaults = require('@wordpress/scripts/config/webpack.config');
const path = require('path');
module.exports = {
  ...defaults,
  entry: {
    // Entry points for shortcode1 and shortcode2
    newEvent: './src/shortcodes/new-event/index.tsx',
    addUser: './src/shortcodes/new-event/index.tsx',
  },
  output: {
    filename: '[name]/[name].bundle.js',
    path: path.resolve(__dirname, 'dist'), // Dynamic output path
  },
  externals: {
    react: 'React',
    'react-dom': 'ReactDOM',
  },
}; 