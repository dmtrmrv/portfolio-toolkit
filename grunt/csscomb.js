module.exports = {
	options: {
		config: '.csscomb.json'
	},
	admin: {
		expand: true,
		src: 'admin/css/<%= package.name %>-admin.css'
	}
};
