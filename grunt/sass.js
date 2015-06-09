module.exports = {
	admin: {
		options: {
			style:     'expanded',
			sourcemap: 'none',
			require:   'susy'
		},
		files: {
			'admin/css/<%= package.name %>-admin.css': 'sass/admin.scss',
		}
	}
};
