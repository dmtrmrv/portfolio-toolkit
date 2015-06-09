module.exports = {
	build: {
		cwd: '.',
		expand: true,
		src: [
			'**/*',
			'!**/assets/**',
			'!**/grunt/**',
			'!**/node_modules/**',
			'!**/sass/**',
			'!.DS_Store',
			'!**/.DS_Store',
			'!.gitignore',
			'!Gruntfile.js',
			'!README.md',
			'!package.json',
			'!*.sublime-project',
			'!*.sublime-workspace',
		],
		dest: '../build/<%= package.name %>/'
	}
}
