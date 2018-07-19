module.exports = {
    "parserOptions": {
        "ecmaVersion": 8,
        "sourceType": "module",
        "ecmaFeatures": {
            "jsx": true,
        }
    },
    "env": {
        "browser": true,
        "node": true,
        "es6": true,
        "jest": true
    },
    "extends": [
        "eslint:recommended",
        "plugin:react/recommended"
    ],
    "plugins": [
        "react"
    ],
    "rules": {
        "react/display-name": 0,
        "react/no-unescaped-entities": 0,
        "react/prop-types": 0,
        "semi": 1,
        "no-console": 0
    }
}
