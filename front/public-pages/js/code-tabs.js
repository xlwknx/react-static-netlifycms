function CodeTabs (selector) {
	this.bindElements(selector);
	this.init();
}

CodeTabs.prototype.bindElements = function bindElements (selector) {
	this.$el = $(selector);
	this.$navs = this.$el.find('.code-tabs-nav .code-tabs-nav-item');
	this.$subnavs = this.$el.find('.code-tabs-subnav .code-tabs-nav-item');
	this.$sections = this.$el.find('.sections [data-section]');
	this.$tabs = this.$sections.find('[data-code-tab]');
};

CodeTabs.prototype.init = function init () {
	var self = this;

	this.$navs.on('click', selectSection);
	this.$subnavs.on('click', selectTab);

	this.$sections.hide();
	this.$tabs.hide();

	function selectSection () {
		var $el = $(this);
		var section = $el.data('section');
		self.selectSection(section);
	}

	function selectTab () {
		var $el = $(this);
		var tab = $el.data('tab');
		self.selectTab(tab);
	}
};

CodeTabs.prototype.selectSection = function selectSection (section) {
	this.$navs.removeClass('active');
	this.$navs.filter('[data-section=' + section + ']').addClass('active');

	this.$sections.hide();
	this.$sections.filter('[data-section=' + section + ']').show();
	return this;
};

CodeTabs.prototype.selectTab = function selectTab (tab) {
	this.$subnavs.removeClass('active');
	this.$subnavs.filter('[data-code-tab=' + tab + ']').addClass('active');

	this.$tabs.hide();
	this.$tabs.filter('[data-code-tab=' + tab + ']').show();
	return this;
};
