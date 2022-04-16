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
        pink: {
          500: '#ea4c89',
        },
      },
      boxShadow: {
        'input-hover': '0px 0px 4px #ea4c89',
        'input-focus': '0px 0px 4px rgba(234, 76, 137, 0.4)',
      },
      screens: {
        desktop: '1920px',
      },
    },
  },
};
