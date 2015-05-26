module.exports = {
	target: {
		options: {
			cwd: 'trunk',
			mainFile: '<%= package.name %>.php',
			domainPath: 'languages/',
			potFilename: '<%= package.name %>.pot',
			type: 'wp-plugin',
			updateTimestamp: false
		}
	}
};
