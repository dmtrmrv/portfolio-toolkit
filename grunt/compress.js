module.exports = {
	build: {
		options: {
			archive: '../build/<%= package.name %>.zip'
		},
		expand: true,
		cwd: '.',
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
	}
}
