module.exports = {
	build: {
		cwd: '.',
		expand: true,
		src: [
			'admin/*.php',
			'admin/css/*.css',
			'includes/*.php',
			'languages/<%= package.name %>.pot',
			'*.php',
			'LICENSE.txt',
			'README.txt',
		],
		dest: '../build/<%= package.name %>/'
	},
	svn: {
		cwd: '.',
		expand: true,
		src: [
			'admin/*.php',
			'admin/css/*.css',
			'includes/*.php',
			'languages/<%= package.name %>.pot',
			'*.php',
			'LICENSE.txt',
			'README.txt',
		],
		dest: '../svn/trunk/'
	},
	assets: {
		cwd: './assets/',
		expand: true,
		src: [
			'*.png',
		],
		dest: '../svn/assets/'
	}
}
