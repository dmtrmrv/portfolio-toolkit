module.exports = {
	target: {
		options: {
			cwd: '.',
			mainFile: '<%= package.name %>.php',
			domainPath: 'languages/',
			potFilename: '<%= package.name %>.pot',
			type: 'wp-plugin',
			updateTimestamp: false
		}
	}
};
