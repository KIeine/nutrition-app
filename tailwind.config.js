module.exports = {
  content: [
    './src/components/**/*.vue',
    './src/pages/**/*.vue',
    './src/layouts/**/*.vue',
    './src/features/**/*.ts',
  ],
  theme: {
    extend: {
      colors: {
        jet: {
          500: '#363537',
        },
        honeydew: {
          500: '#ECFFF8',
        },
      },
    },
  },
};
