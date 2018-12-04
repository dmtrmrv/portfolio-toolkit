const sass = require('node-sass');

module.exports = {
	admin: {
		options: {
			style:     'expanded',
			sourcemap: 'none',
			implementation: sass
		},
		files: {
			'admin/css/<%= package.name %>-admin.css': 'sass/admin.scss',
		}
	}
};
