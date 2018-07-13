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
        "node": true
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
        "semi": 1
    }
}
