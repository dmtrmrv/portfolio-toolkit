module.exports = {
	build: {
		options: {
			archive: '../build/<%= package.name %>.zip'
		},
		expand: true,
		cwd: 'trunk',
		src: [
			'**/*',
			'!.DS_Store',
			'!**/.DS_Store'
		],
	}
}
