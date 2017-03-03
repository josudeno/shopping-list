(function (Document, Util, Namespace, $) {
   'use strict';

    /**
     * @param {object} options  the options
     * 
     * @constructor
     */
    Namespace.Search = function (options) {

        Util.TypeHelper.assertObject(options, "options");
        
        var haveOption = Object.hasOwnProperty.bind(options);
        var notEmptyString = function(string) {Util.TypeHelper.assertEmptyString(string)};
        var positiveInteger = function(integer) {Util.TypeHelper.assertPositiveInteger(integer); return true};
        
        haveOption('searchDelay')      && (positiveInteger(options.searchDelay)) && (this.searchDelay = options.searchDelay);
        
        haveOption('searchInputClass') && (notEmptyString()) && (this.searchInputClass = options.searchInputClass);
        haveOption('textSearching')    && (notEmptyString()) && (this.textSearching    = options.textSearching   );
        haveOption('textNoResults')    && (notEmptyString()) && (this.textNoResults    = options.textNoResults   );
        haveOption('textSearchPrompt') && (notEmptyString()) && (this.textSearchPrompt = options.textSearchPrompt);
        haveOption('textError')        && (notEmptyString()) && (this.textError        = options.textError       );
        haveOption('searchDivClass')   && (notEmptyString()) && (this.searchDivClass   = options.searchDivClass  );

        this.init();
    };
    
    Namespace.Search.prototype = {
        /** @type {int} */
        searchDelay      : 300,
        /** @type {String} */
        searchInputClass : 'search',
        /** @type {String} */
        textSearching    : 'Searching ...',
        /** @type {String} */
        textNoResults    : 'No results found.',
        /** @type {String} */
        textSearchPrompt : 'Start typing to search!',
        /** @type {String} */
        textError        : 'There was an error whilst searching.',
        /** @type {String} */
        searchDivClass   : 'results',
        /** @type {int} */
        minTriggerLength : 3,

        /**
         * Initial function.
         */
        init: function() {
            this.attachSearchEvent();
            this.divSearch = Document.getElementsByClassName(this.searchDivClass)[0];
        },

        /**
         * Attaches the keyup event to a function.
         */
        attachSearchEvent: function () {
            var Search, element;
            Search = this;
            
            /** {HTMLElement} element */
            element = Document.getElementsByClassName(this.searchInputClass)[0];
            element.addEventListener('keyup', function () {
                Search.handleSearchInput(this);
            });
        },

        /**
         *  Handles the search input event.
         *  
         * @param {HTMLElement} element
         */
        handleSearchInput: function(element) {
            clearTimeout(this.lastTimeOut);
            this.lastTimeOut = setTimeout(this.search(element), this.searchDelay);
        },

        /**
         * Do the search.
         *
         * @param triggeringElement
         */
        search: function(triggeringElement) {
            if (triggeringElement.value.length >= this.minTriggerLength) {
                this.renderSearching();
                this.doSearch(triggeringElement.value);
            } else {
                this.renderDefaultText();
                this.rows = this.globalRows;
            }
        },

        /**
         * Do the actual ajax search
         * @param {String} value
         */
        doSearch: function(value) {
            Util.TypeHelper.assertEmptyString(value);
            var Search = this;
            var authorizationToken = $('input[name="_token"]').val();


            $.ajax({
                url: 'product/search',
                type: 'POST',
                beforeSend: function(request) {
                    request.setRequestHeader("X-CSRF-TOKEN", authorizationToken);
                },
                data: {productName: value}
            }).then(
                function(data) {
                    if ($.isEmptyObject(data)) {
                        Search.renderNoResults();
                    } else {
                        Search.renderResults(data);
                    }
                },
                function() {
                    Search.renderError();
                }
            );
        },

        /**
         * Render the default text.
         * @private
         */
        renderDefaultText: function () {
            this.renderMessage(this.textSearchPrompt);
        },

        /**
         * Render a message to indicate that it is searching.
         * @private
         */
        renderSearching: function () {
            this.renderMessage(this.textSearching);
        },

        /**
         * Render the no results message.
         * @private
         */
        renderNoResults: function () {
            this.renderMessage(this.textNoResults);
        },

        /**
         * Render a message to indicate that the was an error whilst searching.
         * @private
         */
        renderError: function () {
            this.renderMessage(this.textError);
        },


        /**
         * Renders the results from the ajax request.
         * @private
         */
        renderResults: function (data) {
            //TODO loop through results and display results

            this.divSearch.appendChild();
        },


        /**
         * Render a message
         *
         * @param {String} message
         * @private
         */
        renderMessage: function (message) {
            var divItem = Util.Factory.HTMLElement.createElement('div');
            divItem.textContent = message;
            var children = this.divSearch.children;
            if (children.length > 1) {
                this.divSearch.removeChild(children[1]);
            }
            this.divSearch.appendChild(divItem);
        }
    };
})(document, Util, Util.Namespace.create("Shopping"), jQuery);

(function(){
    "use strict";
    new Shopping.Search({});
})();
