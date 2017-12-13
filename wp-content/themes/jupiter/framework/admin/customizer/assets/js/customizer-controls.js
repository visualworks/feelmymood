!function($){var api=wp.customize;api.bind("pane-contents-reflowed",function(){var sections=[];api.section.each(function(section){"mk-section"===section.params.type&&void 0!==section.params.section&&sections.push(section)}),sections.sort(api.utils.prioritySort).reverse(),$.each(sections,function(i,section){$("#sub-accordion-section-"+section.params.section).children(".section-meta").after(section.headContainer)});var panels=[];api.panel.each(function(panel){"mk-panel"===panel.params.type&&void 0!==panel.params.panel&&panels.push(panel)}),panels.sort(api.utils.prioritySort).reverse(),$.each(panels,function(i,panel){$("#sub-accordion-panel-"+panel.params.panel).children(".panel-meta").after(panel.headContainer)})});var _panelEmbed=wp.customize.Panel.prototype.embed,_panelIsContextuallyActive=wp.customize.Panel.prototype.isContextuallyActive,_panelAttachEvents=wp.customize.Panel.prototype.attachEvents;wp.customize.Panel=wp.customize.Panel.extend({attachEvents:function(){if("mk-panel"!==this.params.type||void 0===this.params.panel)return void _panelAttachEvents.call(this);_panelAttachEvents.call(this);var panel=this;panel.expanded.bind(function(expanded){var parent=api.panel(panel.params.panel);expanded?parent.contentContainer.addClass("current-panel-parent"):parent.contentContainer.removeClass("current-panel-parent")}),panel.container.find(".customize-panel-back").off("click keydown").on("click keydown",function(event){api.utils.isKeydownButNotEnterEvent(event)||(event.preventDefault(),panel.expanded()&&api.panel(panel.params.panel).expand())})},embed:function(){if("mk-panel"!==this.params.type||void 0===this.params.panel)return void _panelEmbed.call(this);_panelEmbed.call(this);var panel=this;$("#sub-accordion-panel-"+this.params.panel).append(panel.headContainer)},isContextuallyActive:function(){if("mk-panel"!==this.params.type)return _panelIsContextuallyActive.call(this);var panel=this,children=this._children("panel","section");api.panel.each(function(child){child.params.panel&&child.params.panel===panel.id&&children.push(child)}),children.sort(api.utils.prioritySort);var activeCount=0;return _(children).each(function(child){child.active()&&child.isContextuallyActive()&&(activeCount+=1)}),0!==activeCount}});var _sectionEmbed=wp.customize.Section.prototype.embed,_sectionIsContextuallyActive=wp.customize.Section.prototype.isContextuallyActive,_sectionAttachEvents=wp.customize.Section.prototype.attachEvents;wp.customize.Section=wp.customize.Section.extend({attachEvents:function(){if("mk-section"!==this.params.type||void 0===this.params.section)return void _sectionAttachEvents.call(this);_sectionAttachEvents.call(this);var section=this;section.expanded.bind(function(expanded){var parent=api.section(section.params.section);expanded?parent.contentContainer.addClass("current-section-parent"):parent.contentContainer.removeClass("current-section-parent")}),section.container.find(".customize-section-back").off("click keydown").on("click keydown",function(event){api.utils.isKeydownButNotEnterEvent(event)||(event.preventDefault(),section.expanded()&&api.section(section.params.section).expand())})},embed:function(){if("mk-section"!==this.params.type||void 0===this.params.section)return void _sectionEmbed.call(this);_sectionEmbed.call(this);var section=this;$("#sub-accordion-section-"+this.params.section).append(section.headContainer)},isContextuallyActive:function(){if("mk-section"!==this.params.type)return _sectionIsContextuallyActive.call(this);var section=this,children=this._children("section","control");api.section.each(function(child){child.params.section&&child.params.section===section.id&&children.push(child)}),children.sort(api.utils.prioritySort);var activeCount=0;return _(children).each(function(child){void 0!==child.isContextuallyActive?child.active()&&child.isContextuallyActive()&&(activeCount+=1):child.active()&&(activeCount+=1)}),0!==activeCount}})}(jQuery);