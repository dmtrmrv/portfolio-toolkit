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
			'!.git',
			'!.gitignore',
			'!Gruntfile.js',
			'!package.json',
			'!codesniffer.ruleset.xml',
			'!*.sublime-project',
			'!*.sublime-workspace',
			'!README.md',
		]
	}
}
