module.exports = {
  root: true,
  env: {
    node: true,
  },
  plugins: ['vuetify'],
  extends: [
    'plugin:vue/essential',
    // '@vue/airbnb',
    '@vue/typescript/recommended',
  ],
  parserOptions: {
    ecmaVersion: 2020,
  },
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    '@typescript-eslint/camelcase': ['off'],
    '@typescript-eslint/no-non-null-assertion': ['off'],
    'import/prefer-default-export': ['off'],
    'no-param-reassign': ['error', { props: false }],
    'no-unused-expressions': 'off',
    'no-restricted-syntax': [
      'error',
      'LabeledStatement',
      'WithStatement',
    ],
    'no-underscore-dangle': ['error', { allow: ['__typename'] }],
    'max-len': ['error', {
      code: 120,
      tabWidth: 2,
    }],
  },
};
