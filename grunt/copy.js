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
			'!README.txt',
			'!*.sublime-project',
			'!*.sublime-workspace',
		],
		dest: '../build/<%= package.name %>/'
	}
}
