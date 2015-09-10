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
			'!.git',
			'!.gitignore',
			'!Gruntfile.js',
			'!package.json',
			'!codesniffer.ruleset.xml',
			'!*.sublime-project',
			'!*.sublime-workspace',
			'!README.md',
		],
		dest: '../build/<%= package.name %>/'
	},
	svn: {
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
			'!.git',
			'!.gitignore',
			'!Gruntfile.js',
			'!package.json',
			'!codesniffer.ruleset.xml',
			'!*.sublime-project',
			'!*.sublime-workspace',
			'!README.md'
		],
		dest: '../svn/trunk/'
	},
	assets: {
		cwd: './assets/',
		expand: true,
		src: [
			'**',
			'!.DS_Store',
			'!**/.DS_Store',
		],
		dest: '../svn/assets/'
	}
}
