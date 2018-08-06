module.exports = {
	verbose: true,
	collectCoverageFrom: [
        'src/**/*.{js,jsx}'
	],
	// setupFiles: [
	// 	'<rootDir>/config/jest/jestPolyfills.ts',
	// 	'<rootDir>/config/polyfills.js',
	// 	'jest-localstorage-mock',
	// ],
	moduleFileExtensions: [
		'js',
		'jsx',
		'json'
	],
	testMatch: [
		'<rootDir>/src/**/__tests__/**/*.js?(x)',
		'<rootDir>/src/**/?(*.)(spec|test).js?(x)'
	],
	testEnvironment: 'node',
	testURL: 'http://localhost',
    transform: {
        "\\.(jpg|jpeg|png|gif|eot|otf|webp|svg|ttf|woff|woff2|mp4|webm|wav|mp3|m4a|aac|oga)$":
          "<rootDir>/config/jest/fileTransformer.js",
        "^.+\\.jsx?$": "babel-jest"
    },
	transformIgnorePatterns: [
		'[/\\\\]node_modules[/\\\\].+\\.(js|jsx|ts|tsx)$'
	],
	moduleNameMapper: {
		'\\.(css)$': 'identity-obj-proxy'
	}
};
