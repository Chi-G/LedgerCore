module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/**/*.css',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
  ],
  safelist: [
    'text-gradient',
    // Dynamic color classes for portfolio items
    'text-red-500', 'bg-red-500', 'hover:bg-red-500', 'hover:text-red-500', 'hover:border-red-500', 'bg-red-500/10', 'bg-red-500/90',
    'text-orange-500', 'bg-orange-500', 'hover:bg-orange-500', 'hover:text-orange-500', 'hover:border-orange-500', 'bg-orange-500/10', 'bg-orange-500/90',
    'text-yellow-400', 'bg-yellow-400', 'hover:bg-yellow-400', 'hover:text-yellow-400', 'hover:border-yellow-400', 'bg-yellow-400/10', 'bg-yellow-400/90',
    'text-green-400', 'bg-green-400', 'hover:bg-green-400', 'hover:text-green-400', 'hover:border-green-400', 'bg-green-400/10', 'bg-green-400/90',
    'text-purple-400', 'bg-purple-400', 'hover:bg-purple-400', 'hover:text-purple-400', 'hover:border-purple-400', 'bg-purple-400/10', 'bg-purple-400/90',
    'text-cyan-400', 'bg-cyan-400', 'hover:bg-cyan-400', 'hover:text-cyan-400', 'hover:border-cyan-400', 'bg-cyan-400/10', 'bg-cyan-400/90',
    'text-accent', 'bg-accent', 'hover:bg-accent', 'hover:text-accent', 'hover:border-accent', 'bg-accent/10', 'bg-accent/90',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
