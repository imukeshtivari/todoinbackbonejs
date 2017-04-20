// Backbon model for task

var Todo = Backbone.Model.extend({
	defaults: {
		"status":"0",
		"task":""
	}
});

// Backbone collection for all Todo models

var Todos = Backbone.Collection.extend({
	model: Todo,
	url: "http://127.0.0.1:2020/api/todos"
});

var todos = new Todos();

// Backbone view for individual Todo Model

var TodoView = Backbone.View.extend({
	model: new Todo(),
	tagName: "tr",
	initialize: function(){
		this.template = _.template($(".todoView").html());
	},
	events: {
		"click .status": "changestatus",
		"click .btn-edit": "edit",
		"click .btn-update": "update",
		"click .btn-cancel": "cancel",
		"click .btn-delete": "delete"
	},
	changestatus: function(){

		this.model.set("status", this.$(".status").is(":checked"));
		this.model.save(null, {
			success: function(todo){},
			error: function(){
				console.log("Something wen't wrong, please try later.");
			}
		})

	},
	edit: function(){

		//revert the buttons for UI changes

		this.$(".btn-edit").hide();
		this.$(".btn-delete").hide();
		this.$(".btn-update").show();
		this.$(".btn-cancel").show();

		// get the current data into temperary variables 

		var status = this.model.get("status");
		var task = this.model.get("task");
		this.$(".task").parent().html('<input type="text" class="task form-control" value="'+ task +'" />');

	},
	update: function(){

		var status = this.$(".status").is(":checked");
		var task = this.$(".task").val();

		this.model.set("status", status);
		this.model.set("task", task);

		this.model.save(null, {
			success: function(todo){},
			error: function(){
				console.log("Something wen't wrong, please try later.");
			}
		});

	},
	cancel: function(){

		todosView.render();

	},
	delete: function(){

		this.model.destroy({
			success: function(response){},
			error: function(){
				console.log("something wen't wrong, please try later.");
			}
		});

	},
	render: function(){

		this.$el.html(this.template(this.model.toJSON()));
		return this;

	}
});

// Backbone view for Todo Collection

var TodosView = Backbone.View.extend({
	model: todos,
	el: $(".todo-list"),
	initialize: function(){

		this.model.on("add", this.render, this);
		this.model.on("change", () => {
			setTimeout(() => {
				this.render()
			}, 30);
		}, this);
		this.model.on("remove", this.render, this);
		this.model.fetch({
			success: function(json){
			}
		});

	},
	render: function(){

		this.$el.html("");
		_.each(this.model.toArray(), (todo) => {
			this.$el.append((new TodoView({model: todo})).render().$el);
		});
		return this;

	}
});

var todosView = new TodosView();


// jQuery code

$(function(){

	// code for adding a new task

	$(".add-task").on("click", function(e){
		e.preventDefault();
		var todo = new Todo({
			status: false,
			task: $(".input-task").val()
		});

		todos.add(todo);

		todo.save(null, {
			success: function(todo){},
			error: function(){
				console.log("error");
			}
		});

		$(".input-task").val("");

	});
	
});