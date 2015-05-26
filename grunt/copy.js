module.exports = {
	build: {
		cwd: 'trunk',
		expand: true,
		src: [
			'**/*',
			'!.DS_Store',
			'!**/.DS_Store'
		],
		dest: '../build/<%= package.name %>/'
	}
}
