module.exports = {
	options: {
		config: '.csscomb.json'
	},
	admin: {
		expand: true,
		src: 'trunk/admin/css/<%= package.name %>-admin.css'
	}
};
