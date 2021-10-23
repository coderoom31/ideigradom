(function (factory) {
  typeof define === 'function' && define.amd ? define('init', factory) :
  factory();
}((function () { 'use strict';

  var Resolutions = {
    ALL: function ALL() {
      return window.matchMedia("(min-width: 320px)").matches;
    },
    IS_DP_LG: function IS_DP_LG() {
      return window.matchMedia("(min-width: 1920px)").matches;
    },
    IS_NOT_DP_LG: function IS_NOT_DP_LG() {
      return window.matchMedia("(min-width: 1260px) and (max-width: 1919px)").matches;
    },
    IS_DP: function IS_DP() {
      return window.matchMedia("(min-width: 1260px)").matches;
    },
    IS_TAB: function IS_TAB() {
      return window.matchMedia("(max-width: 1259px)").matches;
    },
    IS_TAB_ONLY: function IS_TAB_ONLY() {
      return window.matchMedia("(min-width: 768px) and (max-width: 1259px)").matches;
    },
    IS_NOT_MOB: function IS_NOT_MOB() {
      return window.matchMedia("(min-width: 768px)").matches;
    },
    IS_MOB: function IS_MOB() {
      return window.matchMedia("(max-width: 767px)").matches;
    }
  };
  var Timeout = {
    ANIMATION_TIMEOUT: 500,
    SHORT_TIMEOUT: 10,
    LONG_TIMEOUT: 1000,
    ANIMATION_TOGGLE: 300,
    SLIDER_AUTOPLAY: 6000
  };
  var ErrorMessages = {
    ERROR_MESSAGE_DEFAULT: "\u0417\u0430\u043F\u043E\u043B\u043D\u0438\u0442\u0435 \u044D\u0442\u043E \u043F\u043E\u043B\u0435",
    ERROR_MESSAGE_EMAIL: "\u0412\u0432\u0435\u0434\u0438\u0442\u0435 \u043A\u043E\u0440\u0440\u0435\u043A\u0442\u043D\u044B\u0439 email",
    ERROR_MESSAGE_MIN: "\u0412\u0432\u0435\u0434\u0438\u0442\u0435 \u043A\u0430\u043A \u043C\u0438\u043D\u0438\u043C\u0443\u043C 2 \u0441\u0438\u043C\u0432\u043E\u043B\u0430"
  };

  function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  }

  function _defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  function _createClass(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties(Constructor, staticProps);
    return Constructor;
  }

  var isWidthResize = function isWidthResize(cb) {
    var width = window.innerWidth;
    window.addEventListener("resize", function () {
      if (width !== window.innerWidth) {
        if (typeof cb === "function") cb();
        width = window.innerWidth;
      }
    });
  };
  var setScrollbar = function setScrollbar(arr) {
    if (arr.length) {
      arr.forEach(function (el) {
        return new window.SimpleBar(el);
      });
    }
  }; // склонение чисел

  var num2str = function num2str(number, textArr) {
    var text = textArr[0];
    number = Math.abs(number) % 100;
    var number1 = number % 10;
    if (number > 10 && number < 20) text = textArr[0];else if (number1 > 1 && number1 < 5) text = textArr[1];else if (number1 === 1) text = textArr[2];
    return text;
  };
  var testRegexInput = function testRegexInput(evt, regex) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);

    if (!regex.test(key)) {
      theEvent.returnValue = false;
      if (theEvent.preventDefault) theEvent.preventDefault();
    }
  };

  /**
   * Пересчет вьюпорта для IOS
   */

  var calcViewport = function calcViewport() {
    var vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", "".concat(vh, "px"));
    /*
      CSS style
      height: 100vh;
      height: calc(var(--vh, 1vh) * 100);
    */
  };
  /**
   * изменение вьюпортов на маленьком телефоне
   */

  var initViewport = function initViewport() {
    var w = $(window);
    var ww = w.width();
    var vps, viewport;
    viewport = document.querySelector("meta[name=viewport]");

    if (ww <= 415) {
      vps = "width=375, user-scalable=no";
    } else {
      vps = "width=device-width, user-scalable=no";
    }

    viewport.setAttribute("content", vps);
  };
  /**
   * Lazy Load изображений
   */

  var initLazyLoad = function initLazyLoad() {
    var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

    if ("IntersectionObserver" in window) {
      var lazyImageObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            var lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.srcset = lazyImage.dataset.srcset;
            lazyImageObserver.unobserve(lazyImage);
            setTimeout(function () {
              lazyImage.classList.remove("lazy");
            }, Timeout.ANIMATION_TIMEOUT);
          }
        });
      });
      lazyImages.forEach(function (lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    }
  };
  /**
   * @scrollbar
   * Add simpleBar plugin to scrollbars
   */

  var initScrollBar = function initScrollBar() {
    var scrollBars = document.querySelectorAll(".js-scrollbar");
    setScrollbar(scrollBars);
  };
  /**
   * @btn
   * click on button
   */

  var initCustomBtn = function initCustomBtn() {
    $("body").on("click", ".js-btn", function (e) {
      e.preventDefault();
      e.stopPropagation();
      var $target = $(e.target);
      $target.toggleClass("active");
    }); // открыть лк

    $("body").on("click", ".js-lk-btn", function (e) {
      return $(".js-lk").toggleClass("opened");
    });
    $("body").on("click", ".js-lk-cancel", function (e) {
      return $(".js-lk").removeClass("opened");
    }); // сменить вид карточек в каталоге

    $("body").on("click", "[data-view-btn]", function (e) {
      e.preventDefault();
      e.stopPropagation();
      var $target = $(e.target);
      var $cat = $(".cat__grid");
      $target.addClass("active");
      $target.siblings().removeClass("active");

      if ($target.attr("data-view-btn") === "row") {
        $cat.removeClass("columns");
      } else if ($target.attr("data-view-btn") === "column") {
        $cat.addClass("columns");
      }
    });
  };
  /**
   * @header
   */

  var initFixedHeader = function initFixedHeader() {
    var header = document.querySelector(".js-header");
    if (!header) return;
    var body = document.documentElement;
    var timer = null;
    var scrollPos = 0; // в мобильнике при скролле скрывается , но при скроле вверх появляется

    function scrollHandler() {
      if (body.scrollTop !== 0) {
        header.classList.add("fixed");
      } else {
        header.classList.remove("fixed");
      } // скрывать хедер при скролле вверх и вниз


      if (Resolutions.IS_TAB()) {
        if (timer !== null) {
          clearTimeout(timer);
        }

        var st = body.scrollTop;

        if (st > scrollPos) {
          header.classList.add("hide");
          timer = setTimeout(function () {
            header.classList.remove("hide");
          }, Timeout.ANIMATION_TIMEOUT);
        } else {
          header.classList.remove("hide");
        }

        scrollPos = st;
      }
    }

    window.addEventListener("scroll", scrollHandler);
  };
  /**
   * @fixed_btn
   */

  var initFixedBtn = function initFixedBtn() {
    var blocks = document.querySelectorAll(".js-fixed-block");
    var footer = document.querySelector(".footer");

    function isScrolledIntoView(el) {
      var elemTop = el.getBoundingClientRect().top;
      var elemBottom = el.getBoundingClientRect().bottom;
      var footerTop = footer.getBoundingClientRect().top;
      var height = window.innerHeight;
      var isVisible = elemTop >= 0 && elemTop <= height || elemBottom >= 0 && elemBottom <= height || footerTop < height;
      return isVisible;
    }

    function scrollHandler() {
      blocks.forEach(function (block) {
        var parent = block.parentNode;

        if (isScrolledIntoView(parent)) {
          block.classList.remove("fixed");
        } else {
          block.classList.add("fixed");
        }
      });
    }

    window.addEventListener("scroll", scrollHandler);
  };
  /**
   * @video
   * Видео
   */

  var initVideo = function initVideo() {
    var $videoBlock = $(".js-video");
    if (!$videoBlock.length) return;
    $("body").on("click", ".js-video-btn", function (e) {
      var $target = $(e.target);
      var $parent = $target.parents(".js-video");
      var video = $parent.find("video")[0];

      if (!$parent.hasClass("play")) {
        $parent.addClass("play");
        video.play();
      }
    });
  };
  /**
   * фильтр
   */

  var initFilter = function initFilter() {
    var $filter = $(".filter");
    if (!$filter.length) return;
    $("body").on("change", ".filter input", function (e) {
      $(".filter").addClass("changed");
      $(".cat__filter-btn").attr("data-count", $(".filter input:checked").length);

      if ($(".filter input:checked").length > 0) {
        $(".cat__filter-btn").addClass("active");
      } else {
        $(".cat__filter-btn").removeClass("active");
      }
    }); // показ фильтров на десктопе

    $("body").on("click", "[data-toggle-btn=\"filter\"]", function (e) {
      if ($(".cat__toggle").hasClass("opened")) {
        localStorage.setItem("filterIsOpen", "open");
      } else {
        localStorage.setItem("filterIsOpen", "close");
      }
    });

    if (localStorage.getItem("filterIsOpen") === "open") {
      $("[data-toggle-btn=\"filter\"]").trigger("click");
    }
  };

  /**
   * @toggle
   */

  var initToggle = function initToggle() {
    var toggleBtn = $("[data-toggle-btn]"); // При загрузке

    function onLoad() {
      toggleBtn.each(function (i, el) {
        var currentEl = $(el).attr("data-toggle-btn");
        var parent = $(el).parents("[data-toggle-container]");
        var block = $("[data-toggle=\"".concat(currentEl, "\"]"));

        if (parent.hasClass("opened")) {
          block.css("display", "block");
        }
      });
    } // Скрывает тоггл-блоки


    function removeOpened(src, parent) {
      $("[data-toggle=\"".concat(src, "\"]")).slideUp(Timeout.ANIMATION_TOGGLE);
      parent.removeClass("opened");
    } // Чередует открытие/скрытие


    function toggleClass(src, parent) {
      var block = $("[data-toggle=\"".concat(src, "\"]"));

      if (!parent.hasClass("opened")) {
        block.slideDown(Timeout.ANIMATION_TOGGLE);
        parent.addClass("opened");
      } else {
        removeOpened(src, parent);
      }
    } // Клик по кнопке тоггл


    function onToggleClick(e) {
      e.preventDefault();
      e.stopPropagation();
      var target = $(e.currentTarget);
      var src = target.attr("data-toggle-btn");
      var parent = target.parents("[data-toggle-container]");
      toggleClass(src, parent);
    }

    function onResize() {
      $("[data-toggle]").css("display", "");
      $("[data-toggle-container]").removeClass("opened");
    }

    onLoad();
    isWidthResize(onResize);
    $("body").on("click", "[data-toggle-btn]", onToggleClick);
  };

  /**
   * @tabs
   */
  var initTabs = function initTabs() {
    // Изменить класс
    function changeClass(target) {
      var tabBlocks = document.querySelectorAll("[data-tab-block]");
      tabBlocks.forEach(function (block) {
        if (block.getAttribute("data-tab-block") === target.getAttribute("data-tab")) {
          block.classList.add("active");
          target.classList.add("active");
          $(block).siblings().removeClass("active");
        } else if (block.getAttribute("data-tab-block") === target.getAttribute("data-tab-close")) {
          block.classList.remove("active");
          target.classList.remove("active");
        }
      });
    } // По клику


    function onClick(e) {
      var target = e.target;

      if (target === target.closest("[data-tab]")) {
        $(target).parent().siblings().find(".active").removeClass("active");

        if (target.hasAttribute("data-selector")) {
          $(target).parents(".js-selector").find(".js-select").text($(target).attr("data-selector"));
        }

        changeClass(target);
      } else if (target === target.closest("[data-tab-close]")) {
        $(target).parents(".lk__personal").find("[data-tab]").removeClass("active");
        changeClass(target);
      }
    } // По наведению


    function onHover(e) {
      if (e.target.hasAttribute("data-tab-hover")) {
        onClick(e);
      }
    } // Изменение инпута


    function onChange(e) {
      var target = e.target;
      if ($(target).prop("checked")) changeClass(target);
    }

    document.addEventListener("click", onClick);
    document.addEventListener("mouseover", onHover);
    $("[data-tab]").on("change", onChange);
  };

  /**
   * @modal
   */

  var initModals = function initModals() {
    // Open modal
    function onModalLinkClick(e) {
      e.preventDefault();
      var src = e.target.getAttribute("data-src");
      $.fancybox.close();
      $.fancybox.open({
        src: src,
        type: "inline",
        touch: false,
        autoFocus: false,
        btnTpl: {
          smallBtn: "<button type=\"button\" class=\"modal__close-btn btn js-modal-close\" title=\"Close\">" + "<svg width=\"40\" height=\"40\" viewBox=\"0 0 40 40\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n        <path d=\"M6.66663 6.6665L20 19.9998M33.3333 33.3332L20 19.9998M20 19.9998L6.66663 33.3332M20 19.9998L33.3333 6.6665\" stroke=\"#4E3D35\" stroke-width=\"2\" stroke-linecap=\"round\"/>\n        </svg>" + "</button>"
        },
        afterLoad: function afterLoad() {}
      });
    } // Close modal


    function onBtnCloseClick() {
      $.fancybox.close();
    } // Events listeners


    document.documentElement.addEventListener("click", function (e) {
      var target = e.target;
      if (target === target.closest(".js-modal-open")) onModalLinkClick(e);
      if (target === target.closest(".js-modal-close")) onBtnCloseClick();
    });
  };

  /**
   * @form
   */

  /**
   * Убирает активный класс с инпута
   * @param {Object} el Targeted input
   */
  function changeActiveClass(el) {
    var val = el.val();

    if (!val.length >= 1 && !el.is(":focus")) {
      el.parent().removeClass("is-changed");
    } else {
      el.parent().addClass("is-changed");
    }
  }
  /**
   * Init form decoration label
   */


  var initForm = function initForm() {
    var inputs = $(".form__input input");
    inputs.each(function (i, el) {
      changeActiveClass($(el));
    }); // focus on input

    $("body").on("focus", ".form__input input", function (e) {
      return $(e.target).parent().addClass("is-changed");
    }); // blur input

    $("body").on("blur", ".form__input input", function (e) {
      return changeActiveClass($(e.target));
    }); // change input value

    $("body").on("input propertychange", ".form__input input", function (e) {
      return changeActiveClass($(e.target));
    }); // Inputmask
    // value="+79112521111"

    $("input[type=\"tel\"]").inputmask({
      mask: "+7 (999) 999-99-99",
      clearMaskOnLostFocus: true,
      showMaskOnHover: false,
      clearIncomplete: false
    });
    $("input[type=\"email\"]").inputmask({
      mask: "____@___.__",
      clearMaskOnLostFocus: true // showMaskOnHover: false,

    }); // ___@___.__
    // Autosize textarea on text input

    window.autosize($("textarea"));
  };

  /**
   * @validation
   */

  var initValidation = function initValidation() {
    // Правила валидации
    var rules = {
      required: true,
      messages: {
        required: ErrorMessages.ERROR_MESSAGE_DEFAULT,
        email: ErrorMessages.ERROR_MESSAGE_EMAIL,
        minlength: ErrorMessages.ERROR_MESSAGE_MIN
      }
    };
    $.validator.addMethod("telInputMaskValidation", function (value, element) {
      return this.optional(element) || value.indexOf("_") == -1;
    }, "\u0412\u0432\u0435\u0434\u0438\u0442\u0435 \u043F\u043E\u043B\u043D\u043E\u0441\u0442\u044C\u044E \u0442\u0435\u043B\u0435\u0444\u043E\u043D");
    var mailRules = Object.assign({
      email: true
    }, rules);
    var telRules = Object.assign({
      telInputMaskValidation: true
    }, rules); // Элемент ошибки

    var validateObj = {
      errorElement: "span",
      // onfocusout: false,
      // onsubmit: false,
      highlight: function highlight(element, errorClass, validClass) {
        $(element).parent().addClass(errorClass).removeClass(validClass);
      },
      unhighlight: function unhighlight(element, errorClass, validClass) {
        $(element).parents(".error").removeClass(errorClass).addClass(validClass);
      }
    }; // Валидируемые формы

    $(".validate-form").each(function (i, form) {
      $(form).validate(validateObj);
    });
    $("input").each(function (i, el) {
      if (el.hasAttribute("data-required")) {
        if (el.type == "email") {
          $(el).rules("add", mailRules);
        } else if (el.type == "tel") {
          $(el).rules("add", telRules);
        } else {
          $(el).rules("add", rules);
        }
      }
    }); // Проверить валидность форм

    var checkValid = function checkValid(e) {
      var $form = $(this);

      if (!$form.valid()) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        $form.valid();
      } else {
        $form.parent().addClass("sent");
      }
    };

    $(".validate-form").each(function (i, form) {
      $(form).on("submit", checkValid);
    });
  };

  /**
   * @cart
   * @multiplier
   */

  var initCart = function initCart() {
    var cart = document.querySelector(".cart"); // set discount cost

    function setCurrentDiscount(block, value) {
      var discountBlock = block.querySelector("[data-old-cost]");
      if (!discountBlock) return false;
      var discountVal = discountBlock.getAttribute("data-old-cost");
      block.querySelector("[data-cost]").getAttribute("data-new-cost");
      discountVal = parseInt(discountVal, 10);
      var discount = discountVal * value;
      discountBlock.innerHTML = "".concat(discount.toLocaleString(), "\u20BD");
      block.classList.add("discount");
    } // set current amount


    function setCurrentAmount(block, value) {
      var amount = block.querySelector("[data-amount]");
      if (!amount) return false;
      var costVal = block.querySelector("[data-cost]").getAttribute("data-cost");

      if (value <= 1) {
        amount.innerHTML = "".concat(value, " \u0448\u0442.");
      } else {
        amount.innerHTML = "".concat(value, " \u0448\u0442. \xD7 ").concat(costVal, "\u20BD");
      }
    } // set current cost


    function setCurrentCost(block, value) {
      var cost = block.querySelector("[data-cost]");
      var costVal = cost.getAttribute("data-cost");
      costVal = parseInt(costVal, 10);
      cost.setAttribute("data-new-cost", costVal * value);
      cost.innerHTML = (costVal * value).toLocaleString() + "<span>\u20BD</span>";
      setCurrentDiscount(block, value);
      setCurrentAmount(block, value);
    } // set total cost


    function setTotalCost() {
      var totalCostBlock = document.querySelectorAll(".js-total");
      if (!totalCostBlock.length) return;
      totalCostBlock.forEach(function (block) {
        var parent = $(block).parents(".cart")[0];
        var items = parent.querySelectorAll(".js-cart-item");
        var totalCostVal = 0;
        var totallyVal = 0;
        items.forEach(function (item) {
          var oldCost = item.querySelector("[data-old-cost]");
          var newCost = item.querySelector("[data-new-cost]");
          var value = item.querySelector(".js-handler-input").value;

          if (oldCost) {
            totalCostVal += parseInt(oldCost.getAttribute("data-old-cost") * value, 10);
          } else {
            totalCostVal += parseInt(newCost.getAttribute("data-cost") * value, 10);
          }

          totallyVal += parseInt(newCost.getAttribute("data-new-cost"), 10);
        });
        var cost = block.querySelector("[data-cost]");
        if (cost) cost.innerHTML = totalCostVal.toLocaleString() + "\u20BD";
        var totalCost = $("[data-total]");
        $(totalCost).html(totallyVal.toLocaleString() + "<span>\u20BD</span>");
        $("[data-header-total]").html(totallyVal.toLocaleString() + " \u20BD");
      });
    } // set total discount


    function setTotalDiscount() {
      var totalCostBlock = document.querySelector(".js-total");
      if (!totalCostBlock) return false;
      var discountBlock = totalCostBlock.querySelector(".discount");
      var cost = totalCostBlock.querySelector("[data-discount]");
      var items = document.querySelectorAll(".js-cart-item");
      var totalCostVal = 0;
      var discount = 0;
      [].forEach.call(items, function (item) {
        var oldCostEl = item.querySelector("[data-old-cost]");
        var newCostEl = item.querySelector("[data-cost]");
        var value = item.querySelector(".js-handler-input").value;
        var newCost = parseInt(newCostEl.getAttribute("data-cost"), 10);

        if (oldCostEl) {
          var oldCost = parseInt(oldCostEl.getAttribute("data-old-cost"), 10);
          discount = (newCost - oldCost) * value;
        } else {
          discount = 0;
        }

        totalCostVal += discount;
      });
      discountBlock.style.display = totalCostVal == 0 ? "none" : "";
      cost.innerHTML = totalCostVal.toLocaleString() + "\u20BD";
    } // get total amount of items


    function getTotalAmount() {
      if (!cart) return false;
      var totalAmount = 0;
      var inputs = cart.querySelectorAll(".js-handler-input");
      inputs.forEach(function (input) {
        totalAmount += parseInt(input.value, 10);
      });
      return totalAmount;
    } // set total item amount


    function setTotalItemAmount(total) {
      if (!cart) return false;
      var totalItemBlocks = cart.querySelectorAll("[data-total-amount]");
      var textArr = [" \u0442\u043E\u0432\u0430\u0440\u043E\u0432", " \u0442\u043E\u0432\u0430\u0440\u0430", " \u0442\u043E\u0432\u0430\u0440"];
      var text = num2str(total, textArr);
      totalItemBlocks.forEach(function (block) {
        block.textContent = total + text;
      });
      $(".header__amount-num").html(total);
      if (total == 0) $(".header__cart").addClass("empty");else $(".header__cart").removeClass("empty");
    } // Изменить все


    function changeAll(item, value) {
      setCurrentCost(item, value);
      setCurrentAmount(item, value);
      setTotalCost();
      setTotalDiscount();
      setTotalItemAmount(getTotalAmount());
      var totalBlock = document.querySelector(".order__total");
      if (totalBlock) totalBlock.style.display = "block";
    }
    /**
     * @multiplier
     */


    window.addEventListener("click", function (e) {
      var target = e.target;
      var items = document.querySelectorAll(".js-cart-item"); // клик по хендлерам + и -

      if (target === target.closest(".js-handler")) {
        var input = target.nextElementSibling || target.previousElementSibling;
        var value = 0;
        value = input.value;
        value = parseInt(value, 10); // click on plus or minus

        if (target.hasAttribute("data-minus") && value > target.getAttribute("data-min")) {
          value -= 1;
        } else if (target.hasAttribute("data-plus") && value < target.getAttribute("data-max")) {
          value += 1;
        }

        input.value = value;
        var item = $(input).parents(".js-cart-item")[0];
        changeAll(item, value);
      } else if (target === target.closest("[data-delete]") && items.length) {
        // click on btn delete
        var block = $(target).parents(".js-cart-item");
        block.remove();
        if (!$(".js-cart-item").length) cart.classList.add("cart--empty");
        var discount = document.querySelectorAll("[data-old-cost]");
        if (!discount.length) $("[data-discount]").parent().hide();
        items.forEach(function (item) {
          var input = item.querySelector(".js-handler-input");
          changeAll(item, input.value);
        });
      }
    }); // При загрузке страницы

    var items = document.querySelectorAll(".js-cart-item");
    [].forEach.call(items, function (item) {
      var input = item.querySelector(".js-handler-input");
      var value = input.value;
      var min = input.previousElementSibling ? input.previousElementSibling.getAttribute("data-min") : "";
      var max = input.nextElementSibling ? input.nextElementSibling.getAttribute("data-max") : "";
      changeAll(item, value);
      input.addEventListener("input", function (e) {
        var target = e.target;
        target.value = Math.min(max, Math.max(min, target.value));
        changeAll(item, target.value);
      });
      input.addEventListener("keypress", function (e) {
        var regex = /[0-9]|\./;
        testRegexInput(e, regex);
      });
    });
  };

  /**
   * @slider
   * @constructor
   */

  var Slider = /*#__PURE__*/function () {
    /**
     * @param {object} el Slider container
     * @param {object} properties Props of swiper slider (loop, speed, autoplay...)
     * @param {number} minNumber Minimal numbers of slides in slider
     */
    //  (_this.el, getProperties(), _this.minSlides, resolution, direction, cb);
    function Slider(el, properties, minNumber, resolution, cb) {
      var _this2 = this;

      _classCallCheck(this, Slider);

      this.el = el;
      this.properties = properties;
      this.minNumber = minNumber;
      this.resolution = resolution;
      this.cb = cb;

      this.onWidthResize = function () {
        return _this2.onResize();
      };
    }

    _createClass(Slider, [{
      key: "getSliderLength",
      value: function getSliderLength() {
        var slides = this.el.querySelectorAll(".swiper-slide");
        return slides;
      }
    }, {
      key: "makeSlider",
      value: function makeSlider(_ref) {
        var el = _ref.el,
            _ref$autoplay = _ref.autoplay,
            autoplay = _ref$autoplay === void 0 ? false : _ref$autoplay,
            _ref$speed = _ref.speed,
            speed = _ref$speed === void 0 ? 400 : _ref$speed,
            _ref$effect = _ref.effect,
            effect = _ref$effect === void 0 ? "none" : _ref$effect,
            _ref$fadeEffect = _ref.fadeEffect,
            fadeEffect = _ref$fadeEffect === void 0 ? {} : _ref$fadeEffect,
            _ref$loop = _ref.loop,
            loop = _ref$loop === void 0 ? false : _ref$loop,
            _ref$slideToClickedSl = _ref.slideToClickedSlide,
            slideToClickedSlide = _ref$slideToClickedSl === void 0 ? false : _ref$slideToClickedSl,
            _ref$breakpoints = _ref.breakpoints,
            breakpoints = _ref$breakpoints === void 0 ? {
          767: {
            centeredSlides: false,
            loop: false
          }
        } : _ref$breakpoints,
            _ref$direction = _ref.direction,
            direction = _ref$direction === void 0 ? "horizontal" : _ref$direction,
            _ref$pagination = _ref.pagination,
            pagination = _ref$pagination === void 0 ? {
          el: el.querySelector(".swiper-pagination") || el.parentNode.querySelector(".swiper-pagination"),
          type: "bullets",
          clickable: true
        } : _ref$pagination;
        if (!el) return undefined;
        var prevBtn = el.querySelector(".swiper-button-prev") || el.parentNode.querySelector(".swiper-button-prev");
        var nextBtn = el.querySelector(".swiper-button-next") || el.parentNode.querySelector(".swiper-button-next");
        var slider = new window.Swiper(el, {
          slidesPerView: "auto",
          observer: true,
          observeParents: true,
          observeSlideChildren: true,
          preventInteractionOnTransition: true,
          preventClicksPropagation: true,
          slideToClickedSlide: slideToClickedSlide,
          direction: direction,
          autoplay: autoplay,
          speed: speed,
          loop: loop,
          centeredSlides: false,
          effect: effect,
          fadeEffect: fadeEffect,
          navigation: {
            nextEl: nextBtn,
            prevEl: prevBtn
          },
          pagination: pagination,
          breakpoints: breakpoints,
          onTouchStart: function onTouchStart() {
            allowClick = true;
          },
          onTouchMove: function onTouchMove() {
            allowClick = false;
          },
          onTouchEnd: function onTouchEnd() {
            setTimeout(function () {
              allowClick = true;
            }, Timeout.SHORT_TIMEOUT);
          },
          on: {
            init: function init() {
              this.el.classList.add("start");
            },
            reachBeginning: function reachBeginning() {
              this.el.classList.remove("end");
              this.el.classList.add("start");
            },
            slideChange: function slideChange() {
              this.el.classList.remove("start");
              this.el.classList.remove("end");

              if (this.activeIndex === 0) {
                this.el.classList.add("start");
                this.el.classList.remove("end");
              }
            },
            reachEnd: function reachEnd() {
              this.el.classList.remove("start");
              this.el.classList.add("end");
            }
          }
        });
        return slider;
      }
    }, {
      key: "destroySlider",
      value: function destroySlider(slider) {
        if (slider !== undefined) {
          slider.destroy(true, true);
          slider = undefined;
        }

        return slider;
      }
    }, {
      key: "onLoad",
      value: function onLoad() {
        if (this.slider === undefined && this.resolution() && this.getSliderLength().length > this.minNumber) {
          this.slider = this.makeSlider(this.properties);
          this.el.classList.remove("disabled");
          if (typeof this.cb == "function") this.cb();
        } else if (!this.resolution() || this.getSliderLength().length <= this.minNumber) {
          this.el.classList.add("disabled");
        }

        return this.slider;
      }
    }, {
      key: "onResize",
      value: function onResize() {
        var _this3 = this;

        this.slider = this.destroySlider(this.slider);
        setTimeout(function () {
          _this3.slider = _this3.onLoad();
        }, Timeout.SHORT_TIMEOUT);
      }
    }, {
      key: "initSlider",
      value: function initSlider() {
        if (!this.el) return false;
        this.slider = this.onLoad();
        isWidthResize(this.onWidthResize);
        return this.slider;
      }
    }, {
      key: "init",
      get: function get() {
        return this.initSlider();
      }
    }]);

    return Slider;
  }();

  var sliders = {}; // Create function

  function CreateSlider(minSlides, el, resolution) {
    var props = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : {};
    var cb = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : false;

    var _this = this;

    _this.minSlides = minSlides;
    _this.el = el;
    _this.props = props;

    var getProperties = function getProperties() {
      _this.properties = {
        el: _this.el
      };
      _this.properties = Object.assign(props, _this.properties);
      return _this.properties;
    };

    _this.slider = new Slider(_this.el, getProperties(), _this.minSlides, resolution, cb);
    _this.slider.init;
    return _this.slider;
  }

  window.addEventListener("DOMContentLoaded", function () {
    sliders.reviews = new CreateSlider(1, document.querySelector(".js-reviews-slider"), Resolutions.ALL, {
      effect: "fade",
      fadeEffect: {
        crossFade: true
      }
    });
    sliders.banner = new CreateSlider(1, document.querySelector(".js-banner-slider"), Resolutions.ALL, {
      effect: "fade",
      fadeEffect: {
        crossFade: true
      },
      speed: Timeout.LONG_TIMEOUT,
      autoplay: {
        delay: Timeout.SLIDER_AUTOPLAY
      },
      loop: true
    });
    sliders.products = {};
    var slidersProducts = document.querySelectorAll(".js-products-slider");

    for (var i = 0; i < slidersProducts.length; i++) {
      var newSlidersProducts = new CreateSlider(4, slidersProducts[i], Resolutions.ALL);
      sliders.products[i] = Object.assign(newSlidersProducts);
    }

    sliders.collections = new CreateSlider(1, document.querySelector(".js-collections-slider"), Resolutions.ALL);
    sliders.mobProducts = new CreateSlider(2, document.querySelector(".js-mob-products-slider"), Resolutions.IS_MOB);
    sliders.productDetail = new CreateSlider(2, document.querySelector(".js-prod-detail-slider"), Resolutions.IS_TAB);
  });

  /**
   * @aside_menu
   * @constructor
   */

  document.querySelector(".js-overlay"); // let header = document.querySelector(`.js-header`);

  var Menu = /*#__PURE__*/function () {
    /**
     * @param {Object} el page container
     * @param {function} cb Callback invoked on close/open menu
     */
    function Menu(el, isOverlay, isHover, isNoBodyScroll, cb) {
      var _this2 = this;

      _classCallCheck(this, Menu);

      this.el = el;
      this.cb = cb;
      this.isOverlay = isOverlay;
      this.isHover = isHover;
      this.isNoBodyScroll = isNoBodyScroll;

      this.onLoad = function () {
        return _this2.addEventListeners();
      };

      this.onResize = function () {
        return _this2.closeMenu();
      };

      this.setTimeoutConst;
      this.header = document.querySelector(".js-header");
      this.overlay = document.querySelector(".js-overlay");
    }

    _createClass(Menu, [{
      key: "closeMenu",
      value: function closeMenu() {
        var _this3 = this;

        this.el.classList.remove("animation");
        if (this.overlay) this.overlay.classList.remove("animation");
        this.header.classList.remove("hide");
        setTimeout(function () {
          _this3.el.classList.remove("opened");

          if (_this3.overlay && _this3.isOverlay) _this3.overlay.classList.remove("is-viewed");
          if (_this3.isNoBodyScroll) document.body.classList.remove("no-scroll");
          $(".filter").removeClass("changed");
        }, Timeout.ANIMATION_TOGGLE);
      }
    }, {
      key: "openMenu",
      value: function openMenu(e) {
        var _this4 = this;

        if (e.target.getAttribute("data-menu") === this.el.getAttribute("data-menu")) {
          if (this.el.classList.contains("opened")) {
            this.closeMenu();
          } else {
            this.el.classList.add("opened");
            this.header.classList.add("hide");
            if (this.overlay && this.isOverlay) this.overlay.classList.add("is-viewed");
            if (this.isNoBodyScroll) document.body.classList.add("no-scroll");
            setTimeout(function () {
              _this4.el.classList.add("animation");

              if (_this4.overlay && _this4.isOverlay) _this4.overlay.classList.add("animation");
            }, Timeout.SHORT_TIMEOUT);
          }
        }
      }
    }, {
      key: "mouseOut",
      value: function mouseOut() {
        clearTimeout(this.setTimeoutConst);
      }
    }, {
      key: "hoverMenu",
      value: function hoverMenu(e) {
        var _this5 = this;

        if (e.target.getAttribute("data-menu") === this.el.getAttribute("data-menu")) {
          this.setTimeoutConst = setTimeout(function () {
            _this5.el.classList.add("opened");

            if (_this5.overlay && _this5.isOverlay) _this5.overlay.classList.add("is-viewed");
            if (_this5.isNoBodyScroll) document.body.classList.add("no-scroll");
            setTimeout(function () {
              _this5.el.classList.add("animation");

              if (_this5.overlay && _this5.isOverlay) _this5.overlay.classList.add("animation");
            }, Timeout.SHORT_TIMEOUT);
          }, Timeout.ANIMATION_TOGGLE);
        }
      } // listeners

    }, {
      key: "addEventListeners",
      value: function addEventListeners() {
        var _this6 = this;

        var openBtns = document.querySelectorAll(".js-menu-open");
        var closeBtns = document.querySelectorAll(".js-menu-close"); // menu close

        var onCloseBtnClick = function onCloseBtnClick() {
          return _this6.closeMenu();
        }; // menu open


        var onOpenBtnClick = function onOpenBtnClick(e) {
          return _this6.openMenu(e);
        };

        if (openBtns.length) {
          [].forEach.call(openBtns, function (openBtn) {
            openBtn.addEventListener("click", onOpenBtnClick);
          });
        }

        if (closeBtns.length) {
          [].forEach.call(closeBtns, function (closeBtn) {
            closeBtn.addEventListener("click", onCloseBtnClick);
          });
        }

        if (this.overlay && this.isOverlay) {
          this.overlay.addEventListener("click", onCloseBtnClick);
          if (Resolutions.IS_DP() && this.isHover) this.overlay.addEventListener("mouseover", onCloseBtnClick);
        }
      }
    }, {
      key: "initMenu",
      value: function initMenu() {
        if (!this.el) return;
        this.onLoad();
        isWidthResize(this.onResize);
      }
    }]);

    return Menu;
  }();

  function CreateMenu(el, isOverlay, isHover, isNoBodyScroll) {
    var _this = this;

    _this.el = el;
    _this.isOverlay = isOverlay;
    _this.isHover = isHover;
    _this.isNoBodyScroll = isNoBodyScroll;
    _this.menu = new Menu(_this.el, _this.isOverlay, _this.isHover, _this.isNoBodyScroll);

    _this.menu.initMenu();

    return _this.menu;
  }

  var menu = []; // (el, isOverlay, isHover, isNoBodyScroll, cb)

  window.addEventListener("DOMContentLoaded", function () {
    menu.push(new CreateMenu(document.querySelector(".js-header"), false, false, true));
    menu.push(new CreateMenu(document.querySelector(".js-filter"), true, false, true));
  });

  /**
   * @init
   */

  window.addEventListener("DOMContentLoaded", function () {
    calcViewport();
    initViewport();
    initLazyLoad();
    initScrollBar();
    initToggle();
    initTabs();
    initCustomBtn();
    initFixedHeader();
    initFixedBtn();
    initVideo();
    initModals();
    initForm();
    initValidation();
    initCart();
    initFilter();
  });
  window.addEventListener("resize", function () {
    calcViewport();
    initViewport();
  });

})));
