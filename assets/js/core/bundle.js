!function(t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = t || self).coreui = e()
}(this, (function() {
    "use strict";
    function t(t, e) {
        for (var n = 0; n < e.length; n++) {
            var i = e[n];
            i.enumerable = i.enumerable || !1,
            i.configurable = !0,
            "value"in i && (i.writable = !0),
            Object.defineProperty(t, i.key, i)
        }
    }
    function e(e, n, i) {
        return n && t(e.prototype, n),
        i && t(e, i),
        e
    }
    function n(t, e, n) {
        return e in t ? Object.defineProperty(t, e, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : t[e] = n,
        t
    }
    function i(t, e) {
        var n = Object.keys(t);
        if (Object.getOwnPropertySymbols) {
            var i = Object.getOwnPropertySymbols(t);
            e && (i = i.filter((function(e) {
                return Object.getOwnPropertyDescriptor(t, e).enumerable
            }
            ))),
            n.push.apply(n, i)
        }
        return n
    }
    function r(t) {
        for (var e = 1; e < arguments.length; e++) {
            var r = null != arguments[e] ? arguments[e] : {};
            e % 2 ? i(Object(r), !0).forEach((function(e) {
                n(t, e, r[e])
            }
            )) : Object.getOwnPropertyDescriptors ? Object.defineProperties(t, Object.getOwnPropertyDescriptors(r)) : i(Object(r)).forEach((function(e) {
                Object.defineProperty(t, e, Object.getOwnPropertyDescriptor(r, e))
            }
            ))
        }
        return t
    }
    var o, s, a, l = function(t) {
        do {
            t += ~~(1e6 * Math.random())
        } while (document.getElementById(t));return t
    }, c = function(t) {
        var e = t.getAttribute("data-target");
        if (!e || "#" === e) {
            var n = t.getAttribute("href");
            e = n && "#" !== n ? n.trim() : null
        }
        return e
    }, u = function(t) {
        var e = c(t);
        return e && document.querySelector(e) ? e : null
    }, f = function(t) {
        var e = c(t);
        return e ? document.querySelector(e) : null
    }, h = function(t) {
        if (!t)
            return 0;
        var e = window.getComputedStyle(t)
          , n = e.transitionDuration
          , i = e.transitionDelay
          , r = parseFloat(n)
          , o = parseFloat(i);
        return r || o ? (n = n.split(",")[0],
        i = i.split(",")[0],
        1e3 * (parseFloat(n) + parseFloat(i))) : 0
    }, d = function(t) {
        var e = document.createEvent("HTMLEvents");
        e.initEvent("transitionend", !0, !0),
        t.dispatchEvent(e)
    }, p = function(t) {
        return (t[0] || t).nodeType
    }, g = function(t, e) {
        var n = !1
          , i = e + 5;
        t.addEventListener("transitionend", (function e() {
            n = !0,
            t.removeEventListener("transitionend", e)
        }
        )),
        setTimeout((function() {
            n || d(t)
        }
        ), i)
    }, m = function(t, e, n) {
        Object.keys(n).forEach((function(i) {
            var r, o = n[i], s = e[i], a = s && p(s) ? "element" : (r = s,
            {}.toString.call(r).match(/\s([a-z]+)/i)[1].toLowerCase());
            if (!new RegExp(o).test(a))
                throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + a + '" but expected type "' + o + '".')
        }
        ))
    }, v = function(t) {
        return t ? [].slice.call(t) : []
    }, _ = function(t) {
        if (!t)
            return !1;
        if (t.style && t.parentNode && t.parentNode.style) {
            var e = getComputedStyle(t)
              , n = getComputedStyle(t.parentNode);
            return "none" !== e.display && "none" !== n.display && "hidden" !== e.visibility
        }
        return !1
    }, b = function() {
        return function() {}
    }, y = function(t) {
        return t.offsetHeight
    }, E = function() {
        var t = window.jQuery;
        return t && !document.body.hasAttribute("data-no-jquery") ? t : null
    }, w = (o = {},
    s = 1,
    {
        set: function(t, e, n) {
            "undefined" == typeof t.key && (t.key = {
                key: e,
                id: s
            },
            s++),
            o[t.key.id] = n
        },
        get: function(t, e) {
            if (!t || "undefined" == typeof t.key)
                return null;
            var n = t.key;
            return n.key === e ? o[n.id] : null
        },
        delete: function(t, e) {
            if ("undefined" != typeof t.key) {
                var n = t.key;
                n.key === e && (delete o[n.id],
                delete t.key)
            }
        }
    }), A = function(t, e, n) {
        w.set(t, e, n)
    }, L = function(t, e) {
        return w.get(t, e)
    }, T = function(t, e) {
        w.delete(t, e)
    }, S = Element.prototype, O = S.matches, C = S.closest, D = Element.prototype.querySelectorAll, I = Element.prototype.querySelector, k = function(t, e) {
        return new CustomEvent(t,e)
    };
    if ("function" != typeof window.CustomEvent && (k = function(t, e) {
        e = e || {
            bubbles: !1,
            cancelable: !1,
            detail: null
        };
        var n = document.createEvent("CustomEvent");
        return n.initCustomEvent(t, e.bubbles, e.cancelable, e.detail),
        n
    }
    ),
    !((a = document.createEvent("CustomEvent")).initEvent("Bootstrap", !0, !0),
    a.preventDefault(),
    a.defaultPrevented)) {
        var N = Event.prototype.preventDefault;
        Event.prototype.preventDefault = function() {
            this.cancelable && (N.call(this),
            Object.defineProperty(this, "defaultPrevented", {
                get: function() {
                    return !0
                },
                configurable: !0
            }))
        }
    }
    var P = function() {
        var t = k("Bootstrap", {
            cancelable: !0
        })
          , e = document.createElement("div");
        return e.addEventListener("Bootstrap", (function() {
            return null
        }
        )),
        t.preventDefault(),
        e.dispatchEvent(t),
        t.defaultPrevented
    }();
    O || (O = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector),
    C || (C = function(t) {
        var e = this;
        do {
            if (O.call(e, t))
                return e;
            e = e.parentElement || e.parentNode
        } while (null !== e && 1 === e.nodeType);return null
    }
    );
    var H = /:scope\b/;
    (function() {
        var t = document.createElement("div");
        try {
            t.querySelectorAll(":scope *")
        } catch (t) {
            return !1
        }
        return !0
    }
    )() || (D = function(t) {
        if (!H.test(t))
            return this.querySelectorAll(t);
        var e = Boolean(this.id);
        e || (this.id = l("scope"));
        var n = null;
        try {
            t = t.replace(H, "#" + this.id),
            n = this.querySelectorAll(t)
        } finally {
            e || this.removeAttribute("id")
        }
        return n
    }
    ,
    I = function(t) {
        if (!H.test(t))
            return this.querySelector(t);
        var e = D.call(this, t);
        return "undefined" != typeof e[0] ? e[0] : null
    }
    );
    var x = E()
      , j = /[^.]*(?=\..*)\.|.*/
      , R = /\..*/
      , W = /^key/
      , M = /::\d+$/
      , Y = {}
      , X = 1
      , B = {
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }
      , U = ["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"];
    function K(t, e) {
        return e && e + "::" + X++ || t.uidEvent || X++
    }
    function V(t) {
        var e = K(t);
        return t.uidEvent = e,
        Y[e] = Y[e] || {},
        Y[e]
    }
    function F(t, e) {
        null === t.which && W.test(t.type) && (t.which = null === t.charCode ? t.keyCode : t.charCode),
        t.delegateTarget = e
    }
    function q(t, e, n) {
        void 0 === n && (n = null);
        for (var i = Object.keys(t), r = 0, o = i.length; r < o; r++) {
            var s = t[i[r]];
            if (s.originalHandler === e && s.delegationSelector === n)
                return s
        }
        return null
    }
    function Q(t, e, n) {
        var i = "string" == typeof e
          , r = i ? n : e
          , o = t.replace(R, "")
          , s = B[o];
        return s && (o = s),
        U.indexOf(o) > -1 || (o = t),
        [i, r, o]
    }
    function z(t, e, n, i, r) {
        if ("string" == typeof e && t) {
            n || (n = i,
            i = null);
            var o = Q(e, n, i)
              , s = o[0]
              , a = o[1]
              , l = o[2]
              , c = V(t)
              , u = c[l] || (c[l] = {})
              , f = q(u, a, s ? n : null);
            if (f)
                f.oneOff = f.oneOff && r;
            else {
                var h = K(a, e.replace(j, ""))
                  , d = s ? function(t, e, n) {
                    return function i(r) {
                        for (var o = t.querySelectorAll(e), s = r.target; s && s !== this; s = s.parentNode)
                            for (var a = o.length; a--; )
                                if (o[a] === s)
                                    return F(r, s),
                                    i.oneOff && $.off(t, r.type, n),
                                    n.apply(s, [r]);
                        return null
                    }
                }(t, n, i) : function(t, e) {
                    return function n(i) {
                        return F(i, t),
                        n.oneOff && $.off(t, i.type, e),
                        e.apply(t, [i])
                    }
                }(t, n);
                d.delegationSelector = s ? n : null,
                d.originalHandler = a,
                d.oneOff = r,
                d.uidEvent = h,
                u[h] = d,
                t.addEventListener(l, d, s)
            }
        }
    }
    function G(t, e, n, i, r) {
        var o = q(e[n], i, r);
        o && (t.removeEventListener(n, o, Boolean(r)),
        delete e[n][o.uidEvent])
    }
    var $ = {
        on: function(t, e, n, i) {
            z(t, e, n, i, !1)
        },
        one: function(t, e, n, i) {
            z(t, e, n, i, !0)
        },
        off: function(t, e, n, i) {
            if ("string" == typeof e && t) {
                var r = Q(e, n, i)
                  , o = r[0]
                  , s = r[1]
                  , a = r[2]
                  , l = a !== e
                  , c = V(t)
                  , u = "." === e.charAt(0);
                if ("undefined" == typeof s) {
                    u && Object.keys(c).forEach((function(n) {
                        !function(t, e, n, i) {
                            var r = e[n] || {};
                            Object.keys(r).forEach((function(o) {
                                if (o.indexOf(i) > -1) {
                                    var s = r[o];
                                    G(t, e, n, s.originalHandler, s.delegationSelector)
                                }
                            }
                            ))
                        }(t, c, n, e.slice(1))
                    }
                    ));
                    var f = c[a] || {};
                    Object.keys(f).forEach((function(n) {
                        var i = n.replace(M, "");
                        if (!l || e.indexOf(i) > -1) {
                            var r = f[n];
                            G(t, c, a, r.originalHandler, r.delegationSelector)
                        }
                    }
                    ))
                } else {
                    if (!c || !c[a])
                        return;
                    G(t, c, a, s, o ? n : null)
                }
            }
        },
        trigger: function(t, e, n) {
            if ("string" != typeof e || !t)
                return null;
            var i, r = e.replace(R, ""), o = e !== r, s = U.indexOf(r) > -1, a = !0, l = !0, c = !1, u = null;
            return o && x && (i = x.Event(e, n),
            x(t).trigger(i),
            a = !i.isPropagationStopped(),
            l = !i.isImmediatePropagationStopped(),
            c = i.isDefaultPrevented()),
            s ? (u = document.createEvent("HTMLEvents")).initEvent(r, a, !0) : u = k(e, {
                bubbles: a,
                cancelable: !0
            }),
            "undefined" != typeof n && Object.keys(n).forEach((function(t) {
                Object.defineProperty(u, t, {
                    get: function() {
                        return n[t]
                    }
                })
            }
            )),
            c && (u.preventDefault(),
            P || Object.defineProperty(u, "defaultPrevented", {
                get: function() {
                    return !0
                }
            })),
            l && t.dispatchEvent(u),
            u.defaultPrevented && "undefined" != typeof i && i.preventDefault(),
            u
        }
    }
      , Z = "asyncLoad"
      , J = {
        ACTIVE: "c-active",
        NAV_DROPDOWN_TOGGLE: "c-sidebar-nav-dropdown-toggle",
        SHOW: "c-show",
        VIEW_SCRIPT: "view-script"
    }
      , tt = {
        CLICK_DATA_API: "click.coreui.asyncLoad.data-api",
        XHR_STATUS: "xhr"
    }
      , et = ".c-sidebar-nav-dropdown"
      , nt = ".c-xhr-link, .c-sidebar-nav-link"
      , it = ".c-sidebar-nav-item"
      , rt = ".view-script"
      , ot = {
        defaultPage: "main.html",
        errorPage: "404.html",
        subpagesDirectory: "views/"
    }
      , st = function() {
        function t(t, e) {
            this._config = this._getConfig(e),
            this._element = t;
            var n = location.hash.replace(/^#/, "");
            "" !== n ? this._setUpUrl(n) : this._setUpUrl(this._config.defaultPage),
            this._addEventListeners()
        }
        var n = t.prototype;
        return n._getConfig = function(t) {
            return t = r({}, ot, {}, t)
        }
        ,
        n._loadPage = function(t) {
            var e = this
              , n = this._element
              , i = this._config
              , r = new XMLHttpRequest;
            r.open("GET", i.subpagesDirectory + t);
            var o = new CustomEvent(tt.XHR_STATUS,{
                detail: {
                    url: t,
                    status: r.status
                }
            });
            n.dispatchEvent(o),
            r.onload = function(s) {
                if (200 === r.status) {
                    o = new CustomEvent(tt.XHR_STATUS,{
                        detail: {
                            url: t,
                            status: r.status
                        }
                    }),
                    n.dispatchEvent(o);
                    var a = document.createElement("div");
                    a.innerHTML = s.target.response;
                    var l = Array.from(a.querySelectorAll("script")).map((function(t) {
                        return t.attributes.getNamedItem("src").nodeValue
                    }
                    ));
                    a.querySelectorAll("script").forEach((function(t) {
                        return t.remove(t)
                    }
                    )),
                    window.scrollTo(0, 0),
                    n.innerHTML = "",
                    n.appendChild(a),
                    (c = document.querySelectorAll(rt)).length && c.forEach((function(t) {
                        t.remove()
                    }
                    )),
                    l.length && function t(n, i) {
                        void 0 === i && (i = 0);
                        var r = document.createElement("script");
                        r.type = "text/javascript",
                        r.src = n[i],
                        r.className = J.VIEW_SCRIPT,
                        r.onload = r.onreadystatechange = function() {
                            e.readyState && "complete" !== e.readyState || n.length > i + 1 && t(n, i + 1)
                        }
                        ,
                        document.getElementsByTagName("body")[0].appendChild(r)
                    }(l),
                    window.location.hash = t
                } else
                    window.location.href = i.errorPage;
                var c
            }
            ,
            r.send()
        }
        ,
        n._setUpUrl = function(t) {
            t = t.replace(/^\//, "").split("?")[0],
            Array.from(document.querySelectorAll(nt)).forEach((function(t) {
                t.classList.remove(J.ACTIVE)
            }
            )),
            Array.from(document.querySelectorAll(nt)).forEach((function(t) {
                t.classList.remove(J.ACTIVE)
            }
            )),
            Array.from(document.querySelectorAll(et)).forEach((function(t) {
                t.classList.remove(J.SHOW)
            }
            )),
            Array.from(document.querySelectorAll(et)).forEach((function(e) {
                Array.from(e.querySelectorAll('a[href*="' + t + '"]')).length > 0 && e.classList.add(J.SHOW)
            }
            )),
            Array.from(document.querySelectorAll(it + ' a[href*="' + t + '"]')).forEach((function(t) {
                t.classList.add(J.ACTIVE)
            }
            )),
            this._loadPage(t)
        }
        ,
        n._loadBlank = function(t) {
            window.open(t)
        }
        ,
        n._loadTop = function(t) {
            window.location = t
        }
        ,
        n._update = function(t) {
            "#" !== t.href && ("undefined" != typeof t.dataset.toggle && "null" !== t.dataset.toggle || ("_top" === t.target ? this._loadTop(t.href) : "_blank" === t.target ? this._loadBlank(t.href) : this._setUpUrl(t.getAttribute("href"))))
        }
        ,
        n._addEventListeners = function() {
            var t = this;
            $.on(document, tt.CLICK_DATA_API, nt, (function(e) {
                e.preventDefault();
                var n = e.target;
                n.classList.contains(J.NAV_LINK) || (n = n.closest(nt)),
                n.classList.contains(J.NAV_DROPDOWN_TOGGLE) || "#" === n.getAttribute("href") || t._update(n)
            }
            ))
        }
        ,
        t._asyncLoadInterface = function(e, n) {
            var i = L(e, "coreui.asyncLoad");
            if (i || (i = new t(e,"object" == typeof n && n)),
            "string" == typeof n) {
                if ("undefined" == typeof i[n])
                    throw new TypeError('No method named "' + n + '"');
                i[n]()
            }
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                t._asyncLoadInterface(this, e)
            }
            ))
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return ot
            }
        }]),
        t
    }()
      , at = E();
    if (at) {
        var lt = at.fn[Z];
        at.fn[Z] = st.jQueryInterface,
        at.fn[Z].Constructor = st,
        at.fn[Z].noConflict = function() {
            return at.fn[Z] = lt,
            st.jQueryInterface
        }
    }
    var ct = {
        matches: function(t, e) {
            return O.call(t, e)
        },
        find: function(t, e) {
            return void 0 === e && (e = document.documentElement),
            D.call(e, t)
        },
        findOne: function(t, e) {
            return void 0 === e && (e = document.documentElement),
            I.call(e, t)
        },
        children: function(t, e) {
            var n = this
              , i = v(t.children);
            return i.filter((function(t) {
                return n.matches(t, e)
            }
            ))
        },
        parents: function(t, e) {
            for (var n = [], i = t.parentNode; i && i.nodeType === Node.ELEMENT_NODE && 3 !== i.nodeType; )
                this.matches(i, e) && n.push(i),
                i = i.parentNode;
            return n
        },
        closest: function(t, e) {
            return C.call(t, e)
        },
        prev: function(t, e) {
            for (var n = [], i = t.previousSibling; i && i.nodeType === Node.ELEMENT_NODE && 3 !== i.nodeType; )
                this.matches(i, e) && n.push(i),
                i = i.previousSibling;
            return n
        }
    }
      , ut = {
        CLOSE: "close.coreui.alert",
        CLOSED: "closed.coreui.alert",
        CLICK_DATA_API: "click.coreui.alert.data-api"
    }
      , ft = "alert"
      , ht = "fade"
      , dt = "show"
      , pt = function() {
        function t(t) {
            this._element = t,
            this._element && A(t, "coreui.alert", this)
        }
        var n = t.prototype;
        return n.close = function(t) {
            var e = this._element;
            t && (e = this._getRootElement(t));
            var n = this._triggerCloseEvent(e);
            null === n || n.defaultPrevented || this._removeElement(e)
        }
        ,
        n.dispose = function() {
            T(this._element, "coreui.alert"),
            this._element = null
        }
        ,
        n._getRootElement = function(t) {
            var e = f(t);
            return e || (e = ct.closest(t, "." + ft)),
            e
        }
        ,
        n._triggerCloseEvent = function(t) {
            return $.trigger(t, ut.CLOSE)
        }
        ,
        n._removeElement = function(t) {
            var e = this;
            if (t.classList.remove(dt),
            t.classList.contains(ht)) {
                var n = h(t);
                $.one(t, "transitionend", (function() {
                    return e._destroyElement(t)
                }
                )),
                g(t, n)
            } else
                this._destroyElement(t)
        }
        ,
        n._destroyElement = function(t) {
            t.parentNode && t.parentNode.removeChild(t),
            $.trigger(t, ut.CLOSED)
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                var n = L(this, "coreui.alert");
                n || (n = new t(this)),
                "close" === e && n[e](this)
            }
            ))
        }
        ,
        t.handleDismiss = function(t) {
            return function(e) {
                e && e.preventDefault(),
                t.close(this)
            }
        }
        ,
        t.getInstance = function(t) {
            return L(t, "coreui.alert")
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }]),
        t
    }();
    $.on(document, ut.CLICK_DATA_API, '[data-dismiss="alert"]', pt.handleDismiss(new pt));
    var gt = E();
    if (gt) {
        var mt = gt.fn.alert;
        gt.fn.alert = pt.jQueryInterface,
        gt.fn.alert.Constructor = pt,
        gt.fn.alert.noConflict = function() {
            return gt.fn.alert = mt,
            pt.jQueryInterface
        }
    }
    var vt = "coreui.button"
      , _t = "active"
      , bt = "btn"
      , yt = "focus"
      , Et = '[data-toggle^="button"]'
      , wt = '[data-toggle="buttons"]'
      , At = 'input:not([type="hidden"])'
      , Lt = ".active"
      , Tt = ".btn"
      , St = {
        CLICK_DATA_API: "click.coreui.button.data-api",
        FOCUS_DATA_API: "focus.coreui.button.data-api",
        BLUR_DATA_API: "blur.coreui.button.data-api"
    }
      , Ot = function() {
        function t(t) {
            this._element = t,
            A(t, vt, this)
        }
        var n = t.prototype;
        return n.toggle = function() {
            var t = !0
              , e = !0
              , n = ct.closest(this._element, wt);
            if (n) {
                var i = ct.findOne(At, this._element);
                if (i && "radio" === i.type) {
                    if (i.checked && this._element.classList.contains(_t))
                        t = !1;
                    else {
                        var r = ct.findOne(Lt, n);
                        r && r.classList.remove(_t)
                    }
                    if (t) {
                        if (i.hasAttribute("disabled") || n.hasAttribute("disabled") || i.classList.contains("disabled") || n.classList.contains("disabled"))
                            return;
                        i.checked = !this._element.classList.contains(_t),
                        $.trigger(i, "change")
                    }
                    i.focus(),
                    e = !1
                }
            }
            e && this._element.setAttribute("aria-pressed", !this._element.classList.contains(_t)),
            t && this._element.classList.toggle(_t)
        }
        ,
        n.dispose = function() {
            T(this._element, vt),
            this._element = null
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                var n = L(this, vt);
                n || (n = new t(this)),
                "toggle" === e && n[e]()
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, vt)
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }]),
        t
    }();
    $.on(document, St.CLICK_DATA_API, Et, (function(t) {
        t.preventDefault();
        var e = t.target;
        e.classList.contains(bt) || (e = ct.closest(e, Tt));
        var n = L(e, vt);
        n || (n = new Ot(e)),
        n.toggle()
    }
    )),
    $.on(document, St.FOCUS_DATA_API, Et, (function(t) {
        var e = ct.closest(t.target, Tt);
        e && e.classList.add(yt)
    }
    )),
    $.on(document, St.BLUR_DATA_API, Et, (function(t) {
        var e = ct.closest(t.target, Tt);
        e && e.classList.remove(yt)
    }
    ));
    var Ct = E();
    if (Ct) {
        var Dt = Ct.fn.button;
        Ct.fn.button = Ot.jQueryInterface,
        Ct.fn.button.Constructor = Ot,
        Ct.fn.button.noConflict = function() {
            return Ct.fn.button = Dt,
            Ot.jQueryInterface
        }
    }
    function It(t) {
        return "true" === t || "false" !== t && (t === Number(t).toString() ? Number(t) : "" === t || "null" === t ? null : t)
    }
    function kt(t) {
        return t.replace(/[A-Z]/g, (function(t) {
            return "-" + t.toLowerCase()
        }
        ))
    }
    var Nt = {
        setDataAttribute: function(t, e, n) {
            t.setAttribute("data-" + kt(e), n)
        },
        removeDataAttribute: function(t, e) {
            t.removeAttribute("data-" + kt(e))
        },
        getDataAttributes: function(t) {
            if (!t)
                return {};
            var e = r({}, t.dataset);
            return Object.keys(e).forEach((function(t) {
                e[t] = It(e[t])
            }
            )),
            e
        },
        getDataAttribute: function(t, e) {
            return It(t.getAttribute("data-" + kt(e)))
        },
        offset: function(t) {
            var e = t.getBoundingClientRect();
            return {
                top: e.top + document.body.scrollTop,
                left: e.left + document.body.scrollLeft
            }
        },
        position: function(t) {
            return {
                top: t.offsetTop,
                left: t.offsetLeft
            }
        },
        toggleClass: function(t, e) {
            t && (t.classList.contains(e) ? t.classList.remove(e) : t.classList.add(e))
        }
    }
      , Pt = "carousel"
      , Ht = "coreui.carousel"
      , xt = "." + Ht
      , jt = {
        interval: 5e3,
        keyboard: !0,
        slide: !1,
        pause: "hover",
        wrap: !0,
        touch: !0
    }
      , Rt = {
        interval: "(number|boolean)",
        keyboard: "boolean",
        slide: "(boolean|string)",
        pause: "(string|boolean)",
        wrap: "boolean",
        touch: "boolean"
    }
      , Wt = "next"
      , Mt = "prev"
      , Yt = "left"
      , Xt = "right"
      , Bt = {
        SLIDE: "slide" + xt,
        SLID: "slid" + xt,
        KEYDOWN: "keydown" + xt,
        MOUSEENTER: "mouseenter" + xt,
        MOUSELEAVE: "mouseleave" + xt,
        TOUCHSTART: "touchstart" + xt,
        TOUCHMOVE: "touchmove" + xt,
        TOUCHEND: "touchend" + xt,
        POINTERDOWN: "pointerdown" + xt,
        POINTERUP: "pointerup" + xt,
        DRAG_START: "dragstart" + xt,
        LOAD_DATA_API: "load" + xt + ".data-api",
        CLICK_DATA_API: "click" + xt + ".data-api"
    }
      , Ut = "carousel"
      , Kt = "active"
      , Vt = "slide"
      , Ft = "carousel-item-right"
      , qt = "carousel-item-left"
      , Qt = "carousel-item-next"
      , zt = "carousel-item-prev"
      , Gt = "pointer-event"
      , $t = ".active"
      , Zt = ".active.carousel-item"
      , Jt = ".carousel-item"
      , te = ".carousel-item img"
      , ee = ".carousel-item-next, .carousel-item-prev"
      , ne = ".carousel-indicators"
      , ie = "[data-slide], [data-slide-to]"
      , re = '[data-ride="carousel"]'
      , oe = {
        TOUCH: "touch",
        PEN: "pen"
    }
      , se = function() {
        function t(t, e) {
            this._items = null,
            this._interval = null,
            this._activeElement = null,
            this._isPaused = !1,
            this._isSliding = !1,
            this.touchTimeout = null,
            this.touchStartX = 0,
            this.touchDeltaX = 0,
            this._config = this._getConfig(e),
            this._element = t,
            this._indicatorsElement = ct.findOne(ne, this._element),
            this._touchSupported = "ontouchstart"in document.documentElement || navigator.maxTouchPoints > 0,
            this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent),
            this._addEventListeners(),
            A(t, Ht, this)
        }
        var n = t.prototype;
        return n.next = function() {
            this._isSliding || this._slide(Wt)
        }
        ,
        n.nextWhenVisible = function() {
            !document.hidden && _(this._element) && this.next()
        }
        ,
        n.prev = function() {
            this._isSliding || this._slide(Mt)
        }
        ,
        n.pause = function(t) {
            t || (this._isPaused = !0),
            ct.findOne(ee, this._element) && (d(this._element),
            this.cycle(!0)),
            clearInterval(this._interval),
            this._interval = null
        }
        ,
        n.cycle = function(t) {
            t || (this._isPaused = !1),
            this._interval && (clearInterval(this._interval),
            this._interval = null),
            this._config && this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
        }
        ,
        n.to = function(t) {
            var e = this;
            this._activeElement = ct.findOne(Zt, this._element);
            var n = this._getItemIndex(this._activeElement);
            if (!(t > this._items.length - 1 || t < 0))
                if (this._isSliding)
                    $.one(this._element, Bt.SLID, (function() {
                        return e.to(t)
                    }
                    ));
                else {
                    if (n === t)
                        return this.pause(),
                        void this.cycle();
                    var i = t > n ? Wt : Mt;
                    this._slide(i, this._items[t])
                }
        }
        ,
        n.dispose = function() {
            $.off(this._element, xt),
            T(this._element, Ht),
            this._items = null,
            this._config = null,
            this._element = null,
            this._interval = null,
            this._isPaused = null,
            this._isSliding = null,
            this._activeElement = null,
            this._indicatorsElement = null
        }
        ,
        n._getConfig = function(t) {
            return t = r({}, jt, {}, t),
            m(Pt, t, Rt),
            t
        }
        ,
        n._handleSwipe = function() {
            var t = Math.abs(this.touchDeltaX);
            if (!(t <= 40)) {
                var e = t / this.touchDeltaX;
                this.touchDeltaX = 0,
                e > 0 && this.prev(),
                e < 0 && this.next()
            }
        }
        ,
        n._addEventListeners = function() {
            var t = this;
            this._config.keyboard && $.on(this._element, Bt.KEYDOWN, (function(e) {
                return t._keydown(e)
            }
            )),
            "hover" === this._config.pause && ($.on(this._element, Bt.MOUSEENTER, (function(e) {
                return t.pause(e)
            }
            )),
            $.on(this._element, Bt.MOUSELEAVE, (function(e) {
                return t.cycle(e)
            }
            ))),
            this._config.touch && this._touchSupported && this._addTouchEventListeners()
        }
        ,
        n._addTouchEventListeners = function() {
            var t = this
              , e = function(e) {
                t._pointerEvent && oe[e.pointerType.toUpperCase()] ? t.touchStartX = e.clientX : t._pointerEvent || (t.touchStartX = e.touches[0].clientX)
            }
              , n = function(e) {
                t._pointerEvent && oe[e.pointerType.toUpperCase()] && (t.touchDeltaX = e.clientX - t.touchStartX),
                t._handleSwipe(),
                "hover" === t._config.pause && (t.pause(),
                t.touchTimeout && clearTimeout(t.touchTimeout),
                t.touchTimeout = setTimeout((function(e) {
                    return t.cycle(e)
                }
                ), 500 + t._config.interval))
            };
            v(ct.find(te, this._element)).forEach((function(t) {
                $.on(t, Bt.DRAG_START, (function(t) {
                    return t.preventDefault()
                }
                ))
            }
            )),
            this._pointerEvent ? ($.on(this._element, Bt.POINTERDOWN, (function(t) {
                return e(t)
            }
            )),
            $.on(this._element, Bt.POINTERUP, (function(t) {
                return n(t)
            }
            )),
            this._element.classList.add(Gt)) : ($.on(this._element, Bt.TOUCHSTART, (function(t) {
                return e(t)
            }
            )),
            $.on(this._element, Bt.TOUCHMOVE, (function(e) {
                return function(e) {
                    e.touches && e.touches.length > 1 ? t.touchDeltaX = 0 : t.touchDeltaX = e.touches[0].clientX - t.touchStartX
                }(e)
            }
            )),
            $.on(this._element, Bt.TOUCHEND, (function(t) {
                return n(t)
            }
            )))
        }
        ,
        n._keydown = function(t) {
            if (!/input|textarea/i.test(t.target.tagName))
                switch (t.which) {
                case 37:
                    t.preventDefault(),
                    this.prev();
                    break;
                case 39:
                    t.preventDefault(),
                    this.next()
                }
        }
        ,
        n._getItemIndex = function(t) {
            return this._items = t && t.parentNode ? v(ct.find(Jt, t.parentNode)) : [],
            this._items.indexOf(t)
        }
        ,
        n._getItemByDirection = function(t, e) {
            var n = t === Wt
              , i = t === Mt
              , r = this._getItemIndex(e)
              , o = this._items.length - 1;
            if ((i && 0 === r || n && r === o) && !this._config.wrap)
                return e;
            var s = (r + (t === Mt ? -1 : 1)) % this._items.length;
            return -1 === s ? this._items[this._items.length - 1] : this._items[s]
        }
        ,
        n._triggerSlideEvent = function(t, e) {
            var n = this._getItemIndex(t)
              , i = this._getItemIndex(ct.findOne(Zt, this._element));
            return $.trigger(this._element, Bt.SLIDE, {
                relatedTarget: t,
                direction: e,
                from: i,
                to: n
            })
        }
        ,
        n._setActiveIndicatorElement = function(t) {
            if (this._indicatorsElement) {
                for (var e = ct.find($t, this._indicatorsElement), n = 0; n < e.length; n++)
                    e[n].classList.remove(Kt);
                var i = this._indicatorsElement.children[this._getItemIndex(t)];
                i && i.classList.add(Kt)
            }
        }
        ,
        n._slide = function(t, e) {
            var n, i, r, o = this, s = ct.findOne(Zt, this._element), a = this._getItemIndex(s), l = e || s && this._getItemByDirection(t, s), c = this._getItemIndex(l), u = Boolean(this._interval);
            if (t === Wt ? (n = qt,
            i = Qt,
            r = Yt) : (n = Ft,
            i = zt,
            r = Xt),
            l && l.classList.contains(Kt))
                this._isSliding = !1;
            else if (!this._triggerSlideEvent(l, r).defaultPrevented && s && l) {
                if (this._isSliding = !0,
                u && this.pause(),
                this._setActiveIndicatorElement(l),
                this._element.classList.contains(Vt)) {
                    l.classList.add(i),
                    y(l),
                    s.classList.add(n),
                    l.classList.add(n);
                    var f = parseInt(l.getAttribute("data-interval"), 10);
                    f ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval,
                    this._config.interval = f) : this._config.interval = this._config.defaultInterval || this._config.interval;
                    var d = h(s);
                    $.one(s, "transitionend", (function() {
                        l.classList.remove(n),
                        l.classList.remove(i),
                        l.classList.add(Kt),
                        s.classList.remove(Kt),
                        s.classList.remove(i),
                        s.classList.remove(n),
                        o._isSliding = !1,
                        setTimeout((function() {
                            $.trigger(o._element, Bt.SLID, {
                                relatedTarget: l,
                                direction: r,
                                from: a,
                                to: c
                            })
                        }
                        ), 0)
                    }
                    )),
                    g(s, d)
                } else
                    s.classList.remove(Kt),
                    l.classList.add(Kt),
                    this._isSliding = !1,
                    $.trigger(this._element, Bt.SLID, {
                        relatedTarget: l,
                        direction: r,
                        from: a,
                        to: c
                    });
                u && this.cycle()
            }
        }
        ,
        t.carouselInterface = function(e, n) {
            var i = L(e, Ht)
              , o = r({}, jt, {}, Nt.getDataAttributes(e));
            "object" == typeof n && (o = r({}, o, {}, n));
            var s = "string" == typeof n ? n : o.slide;
            if (i || (i = new t(e,o)),
            "number" == typeof n)
                i.to(n);
            else if ("string" == typeof s) {
                if ("undefined" == typeof i[s])
                    throw new TypeError('No method named "' + s + '"');
                i[s]()
            } else
                o.interval && o.ride && (i.pause(),
                i.cycle())
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                t.carouselInterface(this, e)
            }
            ))
        }
        ,
        t.dataApiClickHandler = function(e) {
            var n = f(this);
            if (n && n.classList.contains(Ut)) {
                var i = r({}, Nt.getDataAttributes(n), {}, Nt.getDataAttributes(this))
                  , o = this.getAttribute("data-slide-to");
                o && (i.interval = !1),
                t.carouselInterface(n, i),
                o && L(n, Ht).to(o),
                e.preventDefault()
            }
        }
        ,
        t.getInstance = function(t) {
            return L(t, Ht)
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return jt
            }
        }]),
        t
    }();
    $.on(document, Bt.CLICK_DATA_API, ie, se.dataApiClickHandler),
    $.on(window, Bt.LOAD_DATA_API, (function() {
        for (var t = v(ct.find(re)), e = 0, n = t.length; e < n; e++)
            se.carouselInterface(t[e], L(t[e], Ht))
    }
    ));
    var ae = E();
    if (ae) {
        var le = ae.fn[Pt];
        ae.fn[Pt] = se.jQueryInterface,
        ae.fn[Pt].Constructor = se,
        ae.fn[Pt].noConflict = function() {
            return ae.fn[Pt] = le,
            se.jQueryInterface
        }
    }
    var ce = "class-toggler"
      , ue = "-sm,-md,-lg,-xl"
      , fe = "-show"
      , he = !1
      , de = "body"
      , pe = "c-class-toggler"
      , ge = {
        CLASS_TOGGLE: "classtoggle",
        CLICK_DATA_API: "click.coreui.class-toggler.data-api"
    }
      , me = ".c-class-toggler"
      , ve = function() {
        function t(t) {
            this._element = t
        }
        var n = t.prototype;
        return n.toggle = function() {
            var t = this;
            this._getElementDataAttributes(this._element).forEach((function(e) {
                var n, i = e.target, r = e.toggle;
                n = "_parent" === i || "parent" === i ? t._element.parentNode : document.querySelector(i),
                r.forEach((function(e) {
                    var r = e.className
                      , o = e.responsive
                      , s = e.postfix
                      , a = "undefined" == typeof e.breakpoints || null === e.breakpoints ? null : t._arrayFromString(e.breakpoints);
                    if (o) {
                        var l;
                        a.forEach((function(t) {
                            r.includes(t) && (l = t)
                        }
                        ));
                        var c = [];
                        "undefined" == typeof l ? c.push(r) : (c.push(r.replace("" + l + s, s)),
                        a.splice(0, a.indexOf(l) + 1).forEach((function(t) {
                            c.push(r.replace("" + l + s, "" + t + s))
                        }
                        )));
                        var u = !1;
                        if (c.forEach((function(t) {
                            n.classList.contains(t) && (u = !0)
                        }
                        )),
                        u)
                            c.forEach((function(t) {
                                n.classList.remove(t);
                                var e = new CustomEvent(ge.CLASS_TOGGLE,{
                                    detail: {
                                        target: i,
                                        add: !1,
                                        className: t
                                    }
                                });
                                n.dispatchEvent(e)
                            }
                            ));
                        else {
                            n.classList.add(r);
                            var f = new CustomEvent(ge.CLASS_TOGGLE,{
                                detail: {
                                    target: i,
                                    add: !0,
                                    className: r
                                }
                            });
                            n.dispatchEvent(f)
                        }
                    } else {
                        var h = n.classList.toggle(r)
                          , d = new CustomEvent(ge.CLASS_TOGGLE,{
                            detail: {
                                target: i,
                                add: h,
                                className: r
                            }
                        });
                        n.dispatchEvent(d)
                    }
                }
                ))
            }
            ))
        }
        ,
        n._arrayFromString = function(t) {
            return t.replace(/ /g, "").split(",")
        }
        ,
        n._isArray = function(t) {
            try {
                return JSON.parse(t.replace(/'/g, '"')),
                !0
            } catch (t) {
                return !1
            }
        }
        ,
        n._convertToArray = function(t) {
            return JSON.parse(t.replace(/'/g, '"'))
        }
        ,
        n._getDataAttributes = function(t, e) {
            var n = t[e];
            return this._isArray(n) ? this._convertToArray(n) : n
        }
        ,
        n._getToggleDetails = function(t, e, n, i) {
            var r = function(t, e, n, i) {
                void 0 === e && (e = he),
                this.className = t,
                this.responsive = e,
                this.breakpoints = n,
                this.postfix = i
            }
              , o = [];
            return Array.isArray(t) ? t.forEach((function(t, s) {
                e = Array.isArray(e) ? e[s] : e,
                n = e ? Array.isArray(n) ? n[s] : n : null,
                i = e ? Array.isArray(i) ? i[s] : i : null,
                o.push(new r(t,e,n,i))
            }
            )) : (n = e ? n : null,
            i = e ? i : null,
            o.push(new r(t,e,n,i))),
            o
        }
        ,
        n._ifArray = function(t, e) {
            return Array.isArray(t) ? t[e] : t
        }
        ,
        n._getElementDataAttributes = function(t) {
            var e = this
              , n = t.dataset
              , i = "undefined" == typeof n.target ? de : this._getDataAttributes(n, "target")
              , r = "undefined" == typeof n.class ? "undefined" : this._getDataAttributes(n, "class")
              , o = "undefined" == typeof n.responsive ? he : this._getDataAttributes(n, "responsive")
              , s = "undefined" == typeof n.breakpoints ? ue : this._getDataAttributes(n, "breakpoints")
              , a = "undefined" == typeof n.postfix ? fe : this._getDataAttributes(n, "postfix")
              , l = []
              , c = function(t, e) {
                this.target = t,
                this.toggle = e
            };
            return Array.isArray(i) ? i.forEach((function(t, n) {
                l.push(new c(t,e._getToggleDetails(e._ifArray(r, n), e._ifArray(o, n), e._ifArray(s, n), e._ifArray(a, n))))
            }
            )) : l.push(new c(i,this._getToggleDetails(r, o, s, a))),
            l
        }
        ,
        t._classTogglerInterface = function(e, n) {
            var i = L(e, "coreui.class-toggler");
            if (i || (i = new t(e,"object" == typeof n && n)),
            "string" == typeof n) {
                if ("undefined" == typeof i[n])
                    throw new TypeError('No method named "' + n + '"');
                i[n]()
            }
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                t._classTogglerInterface(this, e)
            }
            ))
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }]),
        t
    }();
    $.on(document, ge.CLICK_DATA_API, me, (function(t) {
        t.preventDefault();
        var e = t.target;
        e.classList.contains(pe) || (e = e.closest(me)),
        ve._classTogglerInterface(e, "toggle")
    }
    ));
    var _e = E();
    if (_e) {
        var be = _e.fn[ce];
        _e.fn[ce] = ve.jQueryInterface,
        _e.fn[ce].Constructor = ve,
        _e.fn[ce].noConflict = function() {
            return _e.fn[ce] = be,
            ve.jQueryInterface
        }
    }
    var ye = "collapse"
      , Ee = "coreui.collapse"
      , we = "." + Ee
      , Ae = {
        toggle: !0,
        parent: ""
    }
      , Le = {
        toggle: "boolean",
        parent: "(string|element)"
    }
      , Te = {
        SHOW: "show" + we,
        SHOWN: "shown" + we,
        HIDE: "hide" + we,
        HIDDEN: "hidden" + we,
        CLICK_DATA_API: "click" + we + ".data-api"
    }
      , Se = "show"
      , Oe = "collapse"
      , Ce = "collapsing"
      , De = "collapsed"
      , Ie = "width"
      , ke = "height"
      , Ne = ".show, .collapsing"
      , Pe = '[data-toggle="collapse"]'
      , He = function() {
        function t(t, e) {
            this._isTransitioning = !1,
            this._element = t,
            this._config = this._getConfig(e),
            this._triggerArray = v(ct.find('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'));
            for (var n = v(ct.find(Pe)), i = 0, r = n.length; i < r; i++) {
                var o = n[i]
                  , s = u(o)
                  , a = v(ct.find(s)).filter((function(e) {
                    return e === t
                }
                ));
                null !== s && a.length && (this._selector = s,
                this._triggerArray.push(o))
            }
            this._parent = this._config.parent ? this._getParent() : null,
            this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray),
            this._config.toggle && this.toggle(),
            A(t, Ee, this)
        }
        var n = t.prototype;
        return n.toggle = function() {
            this._element.classList.contains(Se) ? this.hide() : this.show()
        }
        ,
        n.show = function() {
            var e = this;
            if (!this._isTransitioning && !this._element.classList.contains(Se)) {
                var n, i;
                this._parent && 0 === (n = v(ct.find(Ne, this._parent)).filter((function(t) {
                    return "string" == typeof e._config.parent ? t.getAttribute("data-parent") === e._config.parent : t.classList.contains(Oe)
                }
                ))).length && (n = null);
                var r = ct.findOne(this._selector);
                if (n) {
                    var o = n.filter((function(t) {
                        return r !== t
                    }
                    ));
                    if ((i = o[0] ? L(o[0], Ee) : null) && i._isTransitioning)
                        return
                }
                if (!$.trigger(this._element, Te.SHOW).defaultPrevented) {
                    n && n.forEach((function(e) {
                        r !== e && t.collapseInterface(e, "hide"),
                        i || A(e, Ee, null)
                    }
                    ));
                    var s = this._getDimension();
                    this._element.classList.remove(Oe),
                    this._element.classList.add(Ce),
                    this._element.style[s] = 0,
                    this._triggerArray.length && this._triggerArray.forEach((function(t) {
                        t.classList.remove(De),
                        t.setAttribute("aria-expanded", !0)
                    }
                    )),
                    this.setTransitioning(!0);
                    var a = "scroll" + (s[0].toUpperCase() + s.slice(1))
                      , l = h(this._element);
                    $.one(this._element, "transitionend", (function() {
                        e._element.classList.remove(Ce),
                        e._element.classList.add(Oe),
                        e._element.classList.add(Se),
                        e._element.style[s] = "",
                        e.setTransitioning(!1),
                        $.trigger(e._element, Te.SHOWN)
                    }
                    )),
                    g(this._element, l),
                    this._element.style[s] = this._element[a] + "px"
                }
            }
        }
        ,
        n.hide = function() {
            var t = this;
            if (!this._isTransitioning && this._element.classList.contains(Se) && !$.trigger(this._element, Te.HIDE).defaultPrevented) {
                var e = this._getDimension();
                this._element.style[e] = this._element.getBoundingClientRect()[e] + "px",
                y(this._element),
                this._element.classList.add(Ce),
                this._element.classList.remove(Oe),
                this._element.classList.remove(Se);
                var n = this._triggerArray.length;
                if (n > 0)
                    for (var i = 0; i < n; i++) {
                        var r = this._triggerArray[i]
                          , o = f(r);
                        o && !o.classList.contains(Se) && (r.classList.add(De),
                        r.setAttribute("aria-expanded", !1))
                    }
                this.setTransitioning(!0);
                this._element.style[e] = "";
                var s = h(this._element);
                $.one(this._element, "transitionend", (function() {
                    t.setTransitioning(!1),
                    t._element.classList.remove(Ce),
                    t._element.classList.add(Oe),
                    $.trigger(t._element, Te.HIDDEN)
                }
                )),
                g(this._element, s)
            }
        }
        ,
        n.setTransitioning = function(t) {
            this._isTransitioning = t
        }
        ,
        n.dispose = function() {
            T(this._element, Ee),
            this._config = null,
            this._parent = null,
            this._element = null,
            this._triggerArray = null,
            this._isTransitioning = null
        }
        ,
        n._getConfig = function(t) {
            return (t = r({}, Ae, {}, t)).toggle = Boolean(t.toggle),
            m(ye, t, Le),
            t
        }
        ,
        n._getDimension = function() {
            return this._element.classList.contains(Ie) ? Ie : ke
        }
        ,
        n._getParent = function() {
            var t = this
              , e = this._config.parent;
            p(e) ? "undefined" == typeof e.jquery && "undefined" == typeof e[0] || (e = e[0]) : e = ct.findOne(e);
            var n = '[data-toggle="collapse"][data-parent="' + e + '"]';
            return v(ct.find(n, e)).forEach((function(e) {
                var n = f(e);
                t._addAriaAndCollapsedClass(n, [e])
            }
            )),
            e
        }
        ,
        n._addAriaAndCollapsedClass = function(t, e) {
            if (t) {
                var n = t.classList.contains(Se);
                e.length && e.forEach((function(t) {
                    n ? t.classList.remove(De) : t.classList.add(De),
                    t.setAttribute("aria-expanded", n)
                }
                ))
            }
        }
        ,
        t.collapseInterface = function(e, n) {
            var i = L(e, Ee)
              , o = r({}, Ae, {}, Nt.getDataAttributes(e), {}, "object" == typeof n && n ? n : {});
            if (!i && o.toggle && /show|hide/.test(n) && (o.toggle = !1),
            i || (i = new t(e,o)),
            "string" == typeof n) {
                if ("undefined" == typeof i[n])
                    throw new TypeError('No method named "' + n + '"');
                i[n]()
            }
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                t.collapseInterface(this, e)
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, Ee)
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return Ae
            }
        }]),
        t
    }();
    $.on(document, Te.CLICK_DATA_API, Pe, (function(t) {
        "A" === t.target.tagName && t.preventDefault();
        var e = Nt.getDataAttributes(this)
          , n = u(this);
        v(ct.find(n)).forEach((function(t) {
            var n, i = L(t, Ee);
            i ? (null === i._parent && "string" == typeof e.parent && (i._config.parent = e.parent,
            i._parent = i._getParent()),
            n = "toggle") : n = e,
            He.collapseInterface(t, n)
        }
        ))
    }
    ));
    var xe = E();
    if (xe) {
        var je = xe.fn[ye];
        xe.fn[ye] = He.jQueryInterface,
        xe.fn[ye].Constructor = He,
        xe.fn[ye].noConflict = function() {
            return xe.fn[ye] = je,
            He.jQueryInterface
        }
    }
    function Re(t) {
        var e = t.getBoundingClientRect();
        return {
            width: e.width,
            height: e.height,
            top: e.top,
            right: e.right,
            bottom: e.bottom,
            left: e.left,
            x: e.left,
            y: e.top
        }
    }
    function We(t) {
        if ("[object Window]" !== t.toString()) {
            var e = t.ownerDocument;
            return e ? e.defaultView : window
        }
        return t
    }
    function Me(t) {
        var e = We(t);
        return {
            scrollLeft: e.pageXOffset,
            scrollTop: e.pageYOffset
        }
    }
    function Ye(t) {
        return t instanceof We(t).Element || t instanceof Element
    }
    function Xe(t) {
        return t instanceof We(t).HTMLElement || t instanceof HTMLElement
    }
    function Be(t) {
        return t ? (t.nodeName || "").toLowerCase() : null
    }
    function Ue(t) {
        return (Ye(t) ? t.ownerDocument : t.document).documentElement
    }
    function Ke(t) {
        return Re(Ue(t)).left + Me(t).scrollLeft
    }
    function Ve(t, e, n) {
        var i;
        void 0 === n && (n = !1);
        var r, o, s = Re(t), a = {
            scrollLeft: 0,
            scrollTop: 0
        }, l = {
            x: 0,
            y: 0
        };
        return n || ("body" !== Be(e) && (a = (r = e) !== We(r) && Xe(r) ? {
            scrollLeft: (o = r).scrollLeft,
            scrollTop: o.scrollTop
        } : Me(r)),
        Xe(e) ? ((l = Re(e)).x += e.clientLeft,
        l.y += e.clientTop) : (i = Ue(e)) && (l.x = Ke(i))),
        {
            x: s.left + a.scrollLeft - l.x,
            y: s.top + a.scrollTop - l.y,
            width: s.width,
            height: s.height
        }
    }
    function Fe(t) {
        return {
            x: t.offsetLeft,
            y: t.offsetTop,
            width: t.offsetWidth,
            height: t.offsetHeight
        }
    }
    function qe(t) {
        return "html" === Be(t) ? t : t.parentNode || t.host || document.ownerDocument || document.documentElement
    }
    function Qe(t) {
        return We(t).getComputedStyle(t)
    }
    function ze(t, e) {
        void 0 === e && (e = []);
        var n = function t(e) {
            if (["html", "body", "#document"].indexOf(Be(e)) >= 0)
                return e.ownerDocument.body;
            if (Xe(e)) {
                var n = Qe(e)
                  , i = n.overflow
                  , r = n.overflowX
                  , o = n.overflowY;
                if (/auto|scroll|overlay|hidden/.test(i + o + r))
                    return e
            }
            return t(qe(e))
        }(t)
          , i = "body" === Be(n)
          , r = i ? We(n) : n
          , o = e.concat(r);
        return i ? o : o.concat(ze(qe(r)))
    }
    function Ge(t) {
        return ["table", "td", "th"].indexOf(Be(t)) >= 0
    }
    function $e(t) {
        var e;
        return !Xe(t) || !(e = t.offsetParent) || "undefined" != typeof window.InstallTrigger && "fixed" === Qe(e).position ? null : e
    }
    function Ze(t) {
        for (var e = We(t), n = $e(t); n && Ge(n); )
            n = $e(n);
        return n && "body" === Be(n) && "static" === Qe(n).position ? e : n || e
    }
    var Je = "top"
      , tn = "bottom"
      , en = "right"
      , nn = "left"
      , rn = [Je, tn, en, nn]
      , on = rn.reduce((function(t, e) {
        return t.concat([e + "-start", e + "-end"])
    }
    ), [])
      , sn = [].concat(rn, ["auto"]).reduce((function(t, e) {
        return t.concat([e, e + "-start", e + "-end"])
    }
    ), [])
      , an = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"];
    function ln(t) {
        var e = new Map
          , n = new Set
          , i = [];
        return t.forEach((function(t) {
            e.set(t.name, t)
        }
        )),
        t.forEach((function(t) {
            n.has(t.name) || function t(r) {
                n.add(r.name),
                [].concat(r.requires || [], r.requiresIfExists || []).forEach((function(i) {
                    if (!n.has(i)) {
                        var r = e.get(i);
                        r && t(r)
                    }
                }
                )),
                i.push(r)
            }(t)
        }
        )),
        i
    }
    function cn(t) {
        return t.split("-")[0]
    }
    var un = {
        placement: "bottom",
        modifiers: [],
        strategy: "absolute"
    };
    function fn() {
        for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++)
            e[n] = arguments[n];
        return !e.some((function(t) {
            return !(t && "function" == typeof t.getBoundingClientRect)
        }
        ))
    }
    function hn(t) {
        void 0 === t && (t = {});
        var e = t
          , n = e.defaultModifiers
          , i = void 0 === n ? [] : n
          , r = e.defaultOptions
          , o = void 0 === r ? un : r;
        return function(t, e, n) {
            void 0 === n && (n = o);
            var r, s, a = {
                placement: "bottom",
                orderedModifiers: [],
                options: Object.assign({}, un, {}, o),
                modifiersData: {},
                elements: {
                    reference: t,
                    popper: e
                },
                attributes: {},
                styles: {}
            }, l = [], c = !1, u = {
                state: a,
                setOptions: function(n) {
                    f(),
                    a.options = Object.assign({}, o, {}, a.options, {}, n),
                    a.scrollParents = {
                        reference: Ye(t) ? ze(t) : [],
                        popper: ze(e)
                    };
                    var r, s, c = function(t) {
                        var e = ln(t);
                        return an.reduce((function(t, n) {
                            return t.concat(e.filter((function(t) {
                                return t.phase === n
                            }
                            )))
                        }
                        ), [])
                    }((r = [].concat(i, a.options.modifiers),
                    s = r.reduce((function(t, e) {
                        var n = t[e.name];
                        return t[e.name] = n ? Object.assign({}, n, {}, e, {
                            options: Object.assign({}, n.options, {}, e.options),
                            data: Object.assign({}, n.data, {}, e.data)
                        }) : e,
                        t
                    }
                    ), {}),
                    Object.keys(s).map((function(t) {
                        return s[t]
                    }
                    ))));
                    return a.orderedModifiers = c.filter((function(t) {
                        return t.enabled
                    }
                    )),
                    a.orderedModifiers.forEach((function(t) {
                        var e = t.name
                          , n = t.options
                          , i = void 0 === n ? {} : n
                          , r = t.effect;
                        if ("function" == typeof r) {
                            var o = r({
                                state: a,
                                name: e,
                                instance: u,
                                options: i
                            });
                            l.push(o || function() {}
                            )
                        }
                    }
                    )),
                    u.update()
                },
                forceUpdate: function() {
                    if (!c) {
                        var t = a.elements
                          , e = t.reference
                          , n = t.popper;
                        if (fn(e, n)) {
                            a.rects = {
                                reference: Ve(e, Ze(n), "fixed" === a.options.strategy),
                                popper: Fe(n)
                            },
                            a.reset = !1,
                            a.placement = a.options.placement,
                            a.orderedModifiers.forEach((function(t) {
                                return a.modifiersData[t.name] = Object.assign({}, t.data)
                            }
                            ));
                            for (var i = 0; i < a.orderedModifiers.length; i++)
                                if (!0 !== a.reset) {
                                    var r = a.orderedModifiers[i]
                                      , o = r.fn
                                      , s = r.options
                                      , l = void 0 === s ? {} : s
                                      , f = r.name;
                                    "function" == typeof o && (a = o({
                                        state: a,
                                        options: l,
                                        name: f,
                                        instance: u
                                    }) || a)
                                } else
                                    a.reset = !1,
                                    i = -1
                        }
                    }
                },
                update: (r = function() {
                    return new Promise((function(t) {
                        u.forceUpdate(),
                        t(a)
                    }
                    ))
                }
                ,
                function() {
                    return s || (s = new Promise((function(t) {
                        Promise.resolve().then((function() {
                            s = void 0,
                            t(r())
                        }
                        ))
                    }
                    ))),
                    s
                }
                ),
                destroy: function() {
                    f(),
                    c = !0
                }
            };
            if (!fn(t, e))
                return u;
            function f() {
                l.forEach((function(t) {
                    return t()
                }
                )),
                l = []
            }
            return u.setOptions(n).then((function(t) {
                !c && n.onFirstUpdate && n.onFirstUpdate(t)
            }
            )),
            u
        }
    }
    var dn = {
        passive: !0
    };
    function pn(t) {
        return t.split("-")[1]
    }
    function gn(t) {
        return ["top", "bottom"].indexOf(t) >= 0 ? "x" : "y"
    }
    function mn(t) {
        var e, n = t.reference, i = t.element, r = t.placement, o = r ? cn(r) : null, s = r ? pn(r) : null, a = n.x + n.width / 2 - i.width / 2, l = n.y + n.height / 2 - i.height / 2;
        switch (o) {
        case Je:
            e = {
                x: a,
                y: n.y - i.height
            };
            break;
        case tn:
            e = {
                x: a,
                y: n.y + n.height
            };
            break;
        case en:
            e = {
                x: n.x + n.width,
                y: l
            };
            break;
        case nn:
            e = {
                x: n.x - i.width,
                y: l
            };
            break;
        default:
            e = {
                x: n.x,
                y: n.y
            }
        }
        var c = o ? gn(o) : null;
        if (null != c) {
            var u = "y" === c ? "height" : "width";
            switch (s) {
            case "start":
                e[c] = Math.floor(e[c]) - Math.floor(n[u] / 2 - i[u] / 2);
                break;
            case "end":
                e[c] = Math.floor(e[c]) + Math.ceil(n[u] / 2 - i[u] / 2)
            }
        }
        return e
    }
    var vn = {
        top: "auto",
        right: "auto",
        bottom: "auto",
        left: "auto"
    };
    function _n(t) {
        var e, n = t.popper, i = t.popperRect, r = t.placement, o = t.offsets, s = t.position, a = t.gpuAcceleration, l = t.adaptive, c = function(t) {
            var e = t.x
              , n = t.y
              , i = window.devicePixelRatio || 1;
            return {
                x: Math.round(e * i) / i || 0,
                y: Math.round(n * i) / i || 0
            }
        }(o), u = c.x, f = c.y, h = o.hasOwnProperty("x"), d = o.hasOwnProperty("y"), p = nn, g = Je, m = window;
        if (l) {
            var v = Ze(n);
            v === We(n) && (v = Ue(n)),
            r === Je && (g = tn,
            f -= v.clientHeight - i.height,
            f *= a ? 1 : -1),
            r === nn && (p = en,
            u -= v.clientWidth - i.width,
            u *= a ? 1 : -1)
        }
        var _, b = Object.assign({
            position: s
        }, l && vn);
        return a ? Object.assign({}, b, ((_ = {})[g] = d ? "0" : "",
        _[p] = h ? "0" : "",
        _.transform = (m.devicePixelRatio || 1) < 2 ? "translate(" + u + "px, " + f + "px)" : "translate3d(" + u + "px, " + f + "px, 0)",
        _)) : Object.assign({}, b, ((e = {})[g] = d ? f + "px" : "",
        e[p] = h ? u + "px" : "",
        e.transform = "",
        e))
    }
    var bn = {
        left: "right",
        right: "left",
        bottom: "top",
        top: "bottom"
    };
    function yn(t) {
        return t.replace(/left|right|bottom|top/g, (function(t) {
            return bn[t]
        }
        ))
    }
    var En = {
        start: "end",
        end: "start"
    };
    function wn(t) {
        return t.replace(/start|end/g, (function(t) {
            return En[t]
        }
        ))
    }
    function An(t) {
        return parseFloat(t) || 0
    }
    function Ln(t) {
        var e = We(t)
          , n = function(t) {
            var e = Xe(t) ? Qe(t) : {};
            return {
                top: An(e.borderTopWidth),
                right: An(e.borderRightWidth),
                bottom: An(e.borderBottomWidth),
                left: An(e.borderLeftWidth)
            }
        }(t)
          , i = "html" === Be(t)
          , r = Ke(t)
          , o = t.clientWidth + n.right
          , s = t.clientHeight + n.bottom;
        return i && e.innerHeight - t.clientHeight > 50 && (s = e.innerHeight - n.bottom),
        {
            top: i ? 0 : t.clientTop,
            right: t.clientLeft > n.left ? n.right : i ? e.innerWidth - o - r : t.offsetWidth - o,
            bottom: i ? e.innerHeight - s : t.offsetHeight - s,
            left: i ? r : t.clientLeft
        }
    }
    function Tn(t, e) {
        var n = Boolean(e.getRootNode && e.getRootNode().host);
        if (t.contains(e))
            return !0;
        if (n) {
            var i = e;
            do {
                if (i && t.isSameNode(i))
                    return !0;
                i = i.parentNode || i.host
            } while (i)
        }
        return !1
    }
    function Sn(t) {
        return Object.assign({}, t, {
            left: t.x,
            top: t.y,
            right: t.x + t.width,
            bottom: t.y + t.height
        })
    }
    function On(t, e) {
        return "viewport" === e ? Sn(function(t) {
            var e = We(t);
            return {
                width: e.innerWidth,
                height: e.innerHeight,
                x: 0,
                y: 0
            }
        }(t)) : Xe(e) ? Re(e) : Sn(function(t) {
            var e = We(t)
              , n = Me(t)
              , i = Ve(Ue(t), e);
            return i.height = Math.max(i.height, e.innerHeight),
            i.width = Math.max(i.width, e.innerWidth),
            i.x = -n.scrollLeft,
            i.y = -n.scrollTop,
            i
        }(Ue(t)))
    }
    function Cn(t, e, n) {
        var i = "clippingParents" === e ? function(t) {
            var e = ze(t)
              , n = ["absolute", "fixed"].indexOf(Qe(t).position) >= 0 && Xe(t) ? Ze(t) : t;
            return Ye(n) ? e.filter((function(t) {
                return Ye(t) && Tn(t, n)
            }
            )) : []
        }(t) : [].concat(e)
          , r = [].concat(i, [n])
          , o = r[0]
          , s = r.reduce((function(e, n) {
            var i = On(t, n)
              , r = Ln(Xe(n) ? n : Ue(t));
            return e.top = Math.max(i.top + r.top, e.top),
            e.right = Math.min(i.right - r.right, e.right),
            e.bottom = Math.min(i.bottom - r.bottom, e.bottom),
            e.left = Math.max(i.left + r.left, e.left),
            e
        }
        ), On(t, o));
        return s.width = s.right - s.left,
        s.height = s.bottom - s.top,
        s.x = s.left,
        s.y = s.top,
        s
    }
    function Dn(t) {
        return Object.assign({}, {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        }, {}, t)
    }
    function In(t, e) {
        return e.reduce((function(e, n) {
            return e[n] = t,
            e
        }
        ), {})
    }
    function kn(t, e) {
        void 0 === e && (e = {});
        var n = e
          , i = n.placement
          , r = void 0 === i ? t.placement : i
          , o = n.boundary
          , s = void 0 === o ? "clippingParents" : o
          , a = n.rootBoundary
          , l = void 0 === a ? "viewport" : a
          , c = n.elementContext
          , u = void 0 === c ? "popper" : c
          , f = n.altBoundary
          , h = void 0 !== f && f
          , d = n.padding
          , p = void 0 === d ? 0 : d
          , g = Dn("number" != typeof p ? p : In(p, rn))
          , m = "popper" === u ? "reference" : "popper"
          , v = t.elements.reference
          , _ = t.rects.popper
          , b = t.elements[h ? m : u]
          , y = Cn(Ye(b) ? b : Ue(t.elements.popper), s, l)
          , E = Re(v)
          , w = mn({
            reference: E,
            element: _,
            strategy: "absolute",
            placement: r
        })
          , A = Sn(Object.assign({}, _, {}, w))
          , L = "popper" === u ? A : E
          , T = {
            top: y.top - L.top + g.top,
            bottom: L.bottom - y.bottom + g.bottom,
            left: y.left - L.left + g.left,
            right: L.right - y.right + g.right
        }
          , S = t.modifiersData.offset;
        if ("popper" === u && S) {
            var O = S[r];
            Object.keys(T).forEach((function(t) {
                var e = [en, tn].indexOf(t) >= 0 ? 1 : -1
                  , n = [Je, tn].indexOf(t) >= 0 ? "y" : "x";
                T[t] += O[n] * e
            }
            ))
        }
        return T
    }
    function Nn(t, e, n) {
        return Math.max(t, Math.min(e, n))
    }
    function Pn(t, e, n) {
        return void 0 === n && (n = {
            x: 0,
            y: 0
        }),
        {
            top: t.top - e.height - n.y,
            right: t.right - e.width + n.x,
            bottom: t.bottom - e.height + n.y,
            left: t.left - e.width - n.x
        }
    }
    function Hn(t) {
        return [Je, en, tn, nn].some((function(e) {
            return t[e] >= 0
        }
        ))
    }
    var xn = hn({
        defaultModifiers: [{
            name: "eventListeners",
            enabled: !0,
            phase: "write",
            fn: function() {},
            effect: function(t) {
                var e = t.state
                  , n = t.instance
                  , i = t.options
                  , r = i.scroll
                  , o = void 0 === r || r
                  , s = i.resize
                  , a = void 0 === s || s
                  , l = We(e.elements.popper)
                  , c = [].concat(e.scrollParents.reference, e.scrollParents.popper);
                return o && c.forEach((function(t) {
                    t.addEventListener("scroll", n.update, dn)
                }
                )),
                a && l.addEventListener("resize", n.update, dn),
                function() {
                    o && c.forEach((function(t) {
                        t.removeEventListener("scroll", n.update, dn)
                    }
                    )),
                    a && l.removeEventListener("resize", n.update, dn)
                }
            },
            data: {}
        }, {
            name: "popperOffsets",
            enabled: !0,
            phase: "read",
            fn: function(t) {
                var e = t.state
                  , n = t.name;
                e.modifiersData[n] = mn({
                    reference: e.rects.reference,
                    element: e.rects.popper,
                    strategy: "absolute",
                    placement: e.placement
                })
            },
            data: {}
        }, {
            name: "computeStyles",
            enabled: !0,
            phase: "beforeWrite",
            fn: function(t) {
                var e = t.state
                  , n = t.options
                  , i = n.gpuAcceleration
                  , r = void 0 === i || i
                  , o = n.adaptive
                  , s = void 0 === o || o
                  , a = {
                    placement: cn(e.placement),
                    popper: e.elements.popper,
                    popperRect: e.rects.popper,
                    gpuAcceleration: r
                };
                e.styles.popper = Object.assign({}, e.styles.popper, {}, _n(Object.assign({}, a, {
                    offsets: e.modifiersData.popperOffsets,
                    position: e.options.strategy,
                    adaptive: s
                }))),
                null != e.modifiersData.arrow && (e.styles.arrow = Object.assign({}, e.styles.arrow, {}, _n(Object.assign({}, a, {
                    offsets: e.modifiersData.arrow,
                    position: "absolute",
                    adaptive: !1
                })))),
                e.attributes.popper = Object.assign({}, e.attributes.popper, {
                    "data-popper-placement": e.placement
                })
            },
            data: {}
        }, {
            name: "applyStyles",
            enabled: !0,
            phase: "write",
            fn: function(t) {
                var e = t.state;
                Object.keys(e.elements).forEach((function(t) {
                    var n = e.styles[t] || {}
                      , i = e.attributes[t] || {}
                      , r = e.elements[t];
                    Xe(r) && Be(r) && (Object.assign(r.style, n),
                    Object.keys(i).forEach((function(t) {
                        var e = i[t];
                        !1 === e ? r.removeAttribute(t) : r.setAttribute(t, !0 === e ? "" : e)
                    }
                    )))
                }
                ))
            },
            effect: function(t) {
                var e = t.state
                  , n = {
                    popper: {
                        position: "absolute",
                        left: "0",
                        top: "0",
                        margin: "0"
                    },
                    arrow: {
                        position: "absolute"
                    },
                    reference: {}
                };
                return Object.assign(e.elements.popper.style, n.popper),
                e.elements.arrow && Object.assign(e.elements.arrow.style, n.arrow),
                function() {
                    Object.keys(e.elements).forEach((function(t) {
                        var i = e.elements[t]
                          , r = e.attributes[t] || {}
                          , o = Object.keys(e.styles.hasOwnProperty(t) ? e.styles[t] : n[t]).reduce((function(t, e) {
                            return t[e] = "",
                            t
                        }
                        ), {});
                        Xe(i) && Be(i) && (Object.assign(i.style, o),
                        Object.keys(r).forEach((function(t) {
                            i.removeAttribute(t)
                        }
                        )))
                    }
                    ))
                }
            },
            requires: ["computeStyles"]
        }, {
            name: "offset",
            enabled: !0,
            phase: "main",
            requires: ["popperOffsets"],
            fn: function(t) {
                var e = t.state
                  , n = t.options
                  , i = t.name
                  , r = n.offset
                  , o = void 0 === r ? [0, 0] : r
                  , s = sn.reduce((function(t, n) {
                    return t[n] = function(t, e, n) {
                        var i = cn(t)
                          , r = [nn, Je].indexOf(i) >= 0 ? -1 : 1
                          , o = "function" == typeof n ? n(Object.assign({}, e, {
                            placement: t
                        })) : n
                          , s = o[0]
                          , a = o[1];
                        return s = s || 0,
                        a = (a || 0) * r,
                        [nn, en].indexOf(i) >= 0 ? {
                            x: a,
                            y: s
                        } : {
                            x: s,
                            y: a
                        }
                    }(n, e.rects, o),
                    t
                }
                ), {})
                  , a = s[e.placement]
                  , l = a.x
                  , c = a.y;
                e.modifiersData.popperOffsets.x += l,
                e.modifiersData.popperOffsets.y += c,
                e.modifiersData[i] = s
            }
        }, {
            name: "flip",
            enabled: !0,
            phase: "main",
            fn: function(t) {
                var e = t.state
                  , n = t.options
                  , i = t.name;
                if (!e.modifiersData[i]._skip) {
                    for (var r = n.fallbackPlacements, o = n.padding, s = n.boundary, a = n.rootBoundary, l = n.altBoundary, c = n.flipVariations, u = void 0 === c || c, f = e.options.placement, h = cn(f), d = r || (h === f || !u ? [yn(f)] : function(t) {
                        if ("auto" === cn(t))
                            return [];
                        var e = yn(t);
                        return [wn(t), e, wn(e)]
                    }(f)), p = [f].concat(d).reduce((function(t, n) {
                        return t.concat("auto" === cn(n) ? function(t, e) {
                            void 0 === e && (e = {});
                            var n = e
                              , i = n.placement
                              , r = n.boundary
                              , o = n.rootBoundary
                              , s = n.padding
                              , a = n.flipVariations
                              , l = pn(i)
                              , c = (l ? a ? on : on.filter((function(t) {
                                return pn(t) === l
                            }
                            )) : rn).reduce((function(e, n) {
                                return e[n] = kn(t, {
                                    placement: n,
                                    boundary: r,
                                    rootBoundary: o,
                                    padding: s
                                })[cn(n)],
                                e
                            }
                            ), {});
                            return Object.keys(c).sort((function(t, e) {
                                return c[t] - c[e]
                            }
                            ))
                        }(e, {
                            placement: n,
                            boundary: s,
                            rootBoundary: a,
                            padding: o,
                            flipVariations: u
                        }) : n)
                    }
                    ), []), g = e.rects.reference, m = e.rects.popper, v = new Map, _ = !0, b = p[0], y = 0; y < p.length; y++) {
                        var E = p[y]
                          , w = cn(E)
                          , A = "start" === pn(E)
                          , L = [Je, tn].indexOf(w) >= 0
                          , T = L ? "width" : "height"
                          , S = kn(e, {
                            placement: E,
                            boundary: s,
                            rootBoundary: a,
                            altBoundary: l,
                            padding: o
                        })
                          , O = L ? A ? en : nn : A ? tn : Je;
                        g[T] > m[T] && (O = yn(O));
                        var C = yn(O)
                          , D = [S[w] <= 0, S[O] <= 0, S[C] <= 0];
                        if (D.every((function(t) {
                            return t
                        }
                        ))) {
                            b = E,
                            _ = !1;
                            break
                        }
                        v.set(E, D)
                    }
                    if (_)
                        for (var I = function(t) {
                            var e = p.find((function(e) {
                                var n = v.get(e);
                                if (n)
                                    return n.slice(0, t).every((function(t) {
                                        return t
                                    }
                                    ))
                            }
                            ));
                            if (e)
                                return b = e,
                                "break"
                        }, k = u ? 3 : 1; k > 0; k--) {
                            if ("break" === I(k))
                                break
                        }
                    e.placement !== b && (e.modifiersData[i]._skip = !0,
                    e.placement = b,
                    e.reset = !0)
                }
            },
            requiresIfExists: ["offset"],
            data: {
                _skip: !1
            }
        }, {
            name: "preventOverflow",
            enabled: !0,
            phase: "main",
            fn: function(t) {
                var e = t.state
                  , n = t.options
                  , i = t.name
                  , r = n.mainAxis
                  , o = void 0 === r || r
                  , s = n.altAxis
                  , a = void 0 !== s && s
                  , l = n.boundary
                  , c = n.rootBoundary
                  , u = n.altBoundary
                  , f = n.padding
                  , h = n.tether
                  , d = void 0 === h || h
                  , p = n.tetherOffset
                  , g = void 0 === p ? 0 : p
                  , m = kn(e, {
                    boundary: l,
                    rootBoundary: c,
                    padding: f,
                    altBoundary: u
                })
                  , v = cn(e.placement)
                  , _ = pn(e.placement)
                  , b = !_
                  , y = gn(v)
                  , E = "x" === y ? "y" : "x"
                  , w = e.modifiersData.popperOffsets
                  , A = e.rects.reference
                  , L = e.rects.popper
                  , T = "function" == typeof g ? g(Object.assign({}, e.rects, {
                    placement: e.placement
                })) : g
                  , S = {
                    x: 0,
                    y: 0
                };
                if (o) {
                    var O = "y" === y ? Je : nn
                      , C = "y" === y ? tn : en
                      , D = "y" === y ? "height" : "width"
                      , I = w[y]
                      , k = w[y] + m[O]
                      , N = w[y] - m[C]
                      , P = d ? -L[D] / 2 : 0
                      , H = "start" === _ ? A[D] : L[D]
                      , x = "start" === _ ? -L[D] : -A[D]
                      , j = e.elements.arrow
                      , R = d && j ? Fe(j) : {
                        width: 0,
                        height: 0
                    }
                      , W = e.modifiersData["arrow#persistent"] ? e.modifiersData["arrow#persistent"].padding : {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0
                    }
                      , M = W[O]
                      , Y = W[C]
                      , X = Nn(0, A[D], R[D])
                      , B = b ? A[D] / 2 - P - X - M - T : H - X - M - T
                      , U = b ? -A[D] / 2 + P + X + Y + T : x + X + Y + T
                      , K = e.elements.arrow && Ze(e.elements.arrow)
                      , V = K ? "y" === y ? K.clientTop || 0 : K.clientLeft || 0 : 0
                      , F = e.modifiersData.offset ? e.modifiersData.offset[e.placement][y] : 0
                      , q = w[y] + B - F - V
                      , Q = w[y] + U - F
                      , z = Nn(d ? Math.min(k, q) : k, I, d ? Math.max(N, Q) : N);
                    w[y] = z,
                    S[y] = z - I
                }
                if (a) {
                    var G = "x" === y ? Je : nn
                      , $ = "x" === y ? tn : en
                      , Z = w[E]
                      , J = Nn(Z + m[G], Z, Z - m[$]);
                    e.modifiersData.popperOffsets[E] = J,
                    S[E] = J - Z
                }
                e.modifiersData[i] = S
            },
            requiresIfExists: ["offset"]
        }, {
            name: "arrow",
            enabled: !0,
            phase: "main",
            fn: function(t) {
                var e, n = t.state, i = t.name, r = n.elements.arrow, o = n.modifiersData.popperOffsets, s = cn(n.placement), a = gn(s), l = [nn, en].indexOf(s) >= 0 ? "height" : "width";
                if (r) {
                    var c = n.modifiersData[i + "#persistent"].padding
                      , u = Fe(r)
                      , f = "y" === a ? Je : nn
                      , h = "y" === a ? tn : en
                      , d = n.rects.reference[l] + n.rects.reference[a] - o[a] - n.rects.popper[l]
                      , p = o[a] - n.rects.reference[a]
                      , g = n.elements.arrow && Ze(n.elements.arrow)
                      , m = d / 2 - p / 2 - (g ? "y" === a ? g.clientLeft || 0 : g.clientTop || 0 : 0)
                      , v = Nn(c[f], n.rects.popper[l] / 2 - u[l] / 2 + m, n.rects.popper[l] - u[l] - c[h])
                      , _ = a;
                    n.modifiersData[i] = ((e = {})[_] = v,
                    e)
                }
            },
            effect: function(t) {
                var e = t.state
                  , n = t.options
                  , i = t.name
                  , r = n.element
                  , o = void 0 === r ? "[data-popper-arrow]" : r
                  , s = n.padding
                  , a = void 0 === s ? 0 : s;
                ("string" != typeof o || (o = e.elements.popper.querySelector(o))) && Tn(e.elements.popper, o) && (e.elements.arrow = o,
                e.modifiersData[i + "#persistent"] = {
                    padding: Dn("number" != typeof a ? a : In(a, rn))
                })
            },
            requires: ["popperOffsets"],
            requiresIfExists: ["preventOverflow"]
        }, {
            name: "hide",
            enabled: !0,
            phase: "main",
            requiresIfExists: ["preventOverflow"],
            fn: function(t) {
                var e = t.state
                  , n = t.name
                  , i = e.rects.reference
                  , r = e.rects.popper
                  , o = e.modifiersData.preventOverflow
                  , s = kn(e, {
                    elementContext: "reference"
                })
                  , a = kn(e, {
                    altBoundary: !0
                })
                  , l = Pn(s, i)
                  , c = Pn(a, r, o)
                  , u = Hn(l)
                  , f = Hn(c);
                e.modifiersData[n] = {
                    referenceClippingOffsets: l,
                    popperEscapeOffsets: c,
                    isReferenceHidden: u,
                    hasPopperEscaped: f
                },
                e.attributes.popper = Object.assign({}, e.attributes.popper, {
                    "data-popper-reference-hidden": u,
                    "data-popper-escaped": f
                })
            }
        }]
    })
      , jn = "dropdown"
      , Rn = "coreui.dropdown"
      , Wn = "." + Rn
      , Mn = new RegExp("38|40|27")
      , Yn = {
        HIDE: "hide" + Wn,
        HIDDEN: "hidden" + Wn,
        SHOW: "show" + Wn,
        SHOWN: "shown" + Wn,
        CLICK: "click" + Wn,
        CLICK_DATA_API: "click" + Wn + ".data-api",
        KEYDOWN_DATA_API: "keydown" + Wn + ".data-api",
        KEYUP_DATA_API: "keyup" + Wn + ".data-api"
    }
      , Xn = "disabled"
      , Bn = "show"
      , Un = "dropup"
      , Kn = "dropright"
      , Vn = "dropleft"
      , Fn = "dropdown-menu-right"
      , qn = "position-static"
      , Qn = '[data-toggle="dropdown"]'
      , zn = ".dropdown form"
      , Gn = ".dropdown-menu"
      , $n = ".navbar-nav"
      , Zn = ".c-header-nav"
      , Jn = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)"
      , ti = "top-start"
      , ei = "top-end"
      , ni = "bottom-start"
      , ii = "bottom-end"
      , ri = "right-start"
      , oi = "left-start"
      , si = {
        offset: [0, 0],
        flip: !0,
        boundary: "scrollParent",
        reference: "toggle",
        display: "dynamic",
        popperConfig: null
    }
      , ai = {
        offset: "(array|function)",
        flip: "boolean",
        boundary: "(string|element)",
        reference: "(string|element)",
        display: "string",
        popperConfig: "(null|object)"
    }
      , li = function() {
        function t(t, e) {
            this._element = t,
            this._popper = null,
            this._config = this._getConfig(e),
            this._menu = this._getMenuElement(),
            this._inNavbar = this._detectNavbar(),
            this._inHeader = this._detectHeader(),
            this._addEventListeners(),
            A(t, Rn, this)
        }
        var n = t.prototype;
        return n.toggle = function() {
            if (!this._element.disabled && !this._element.classList.contains(Xn)) {
                var e = this._menu.classList.contains(Bn);
                t.clearMenus(),
                e || this.show()
            }
        }
        ,
        n.show = function() {
            if (!(this._element.disabled || this._element.classList.contains(Xn) || this._menu.classList.contains(Bn))) {
                var e = t.getParentFromElement(this._element)
                  , n = {
                    relatedTarget: this._element
                };
                if (!$.trigger(e, Yn.SHOW, n).defaultPrevented) {
                    if (!this._inNavbar && !this._inHeader) {
                        if ("undefined" == typeof xn)
                            throw new TypeError("Bootstrap's dropdowns require Popper.js (https://popper.js.org)");
                        var i = this._element;
                        "parent" === this._config.reference ? i = e : p(this._config.reference) && (i = this._config.reference,
                        "undefined" != typeof this._config.reference.jquery && (i = this._config.reference[0])),
                        "scrollParent" !== this._config.boundary && e.classList.add(qn),
                        this._popper = xn(i, this._menu, this._getPopperConfig())
                    }
                    "ontouchstart"in document.documentElement && !v(ct.closest(e, $n)).length && v(document.body.children).forEach((function(t) {
                        return $.on(t, "mouseover", null, (function() {}
                        ))
                    }
                    )),
                    "ontouchstart"in document.documentElement && !v(ct.closest(e, Zn)).length && v(document.body.children).forEach((function(t) {
                        return $.on(t, "mouseover", null, (function() {}
                        ))
                    }
                    )),
                    this._element.focus(),
                    this._element.setAttribute("aria-expanded", !0),
                    Nt.toggleClass(this._menu, Bn),
                    Nt.toggleClass(e, Bn),
                    $.trigger(e, Yn.SHOWN, n)
                }
            }
        }
        ,
        n.hide = function() {
            if (!this._element.disabled && !this._element.classList.contains(Xn) && this._menu.classList.contains(Bn)) {
                var e = t.getParentFromElement(this._element)
                  , n = {
                    relatedTarget: this._element
                };
                $.trigger(e, Yn.HIDE, n).defaultPrevented || (this._popper && this._popper.destroy(),
                Nt.toggleClass(this._menu, Bn),
                Nt.toggleClass(e, Bn),
                $.trigger(e, Yn.HIDDEN, n))
            }
        }
        ,
        n.dispose = function() {
            T(this._element, Rn),
            $.off(this._element, Wn),
            this._element = null,
            this._menu = null,
            this._popper && (this._popper.destroy(),
            this._popper = null)
        }
        ,
        n.update = function() {
            this._inNavbar = this._detectNavbar(),
            this._inHeader = this._detectHeader(),
            this._popper && this._popper.scheduleUpdate()
        }
        ,
        n._addEventListeners = function() {
            var t = this;
            $.on(this._element, Yn.CLICK, (function(e) {
                e.preventDefault(),
                e.stopPropagation(),
                t.toggle()
            }
            ))
        }
        ,
        n._getConfig = function(t) {
            return t = r({}, this.constructor.Default, {}, Nt.getDataAttributes(this._element), {}, t),
            m(jn, t, this.constructor.DefaultType),
            t
        }
        ,
        n._getMenuElement = function() {
            var e = t.getParentFromElement(this._element);
            return ct.findOne(Gn, e)
        }
        ,
        n._getPlacement = function() {
            var t = this._element.parentNode
              , e = ni;
            return t.classList.contains(Un) ? (e = ti,
            this._menu.classList.contains(Fn) && (e = ei)) : t.classList.contains(Kn) ? e = ri : t.classList.contains(Vn) ? e = oi : this._menu.classList.contains(Fn) && (e = ii),
            e
        }
        ,
        n._detectNavbar = function() {
            return Boolean(ct.closest(this._element, ".navbar"))
        }
        ,
        n._detectHeader = function() {
            return Boolean(ct.closest(this._element, ".c-header"))
        }
        ,
        n._getOffset = function() {
            var t = this
              , e = [];
            return "function" == typeof this._config.offset ? e.fn = function(e) {
                return e.offsets = r({}, e.offsets, {}, t._config.offset(e.offsets, t._element) || {}),
                e
            }
            : e.offset = this._config.offset,
            e
        }
        ,
        n._getPopperConfig = function() {
            var t = {
                placement: this._getPlacement(),
                modifiers: [{
                    name: "offset",
                    options: {
                        offset: this._getOffset()
                    }
                }, {
                    name: "flip",
                    enabled: this._config.flip
                }, {
                    name: "preventOverflow",
                    options: {
                        boundary: this._config.boundary
                    }
                }]
            };
            return "static" === this._config.display && (t.modifiers.applyStyle = {
                enabled: !1
            }),
            r({}, t, {}, this._config.popperConfig)
        }
        ,
        t.dropdownInterface = function(e, n) {
            var i = L(e, Rn);
            if (i || (i = new t(e,"object" == typeof n ? n : null)),
            "string" == typeof n) {
                if ("undefined" == typeof i[n])
                    throw new TypeError('No method named "' + n + '"');
                i[n]()
            }
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                t.dropdownInterface(this, e)
            }
            ))
        }
        ,
        t.clearMenus = function(e) {
            if (!e || 3 !== e.which && ("keyup" !== e.type || 9 === e.which))
                for (var n = v(ct.find(Qn)), i = 0, r = n.length; i < r; i++) {
                    var o = t.getParentFromElement(n[i])
                      , s = L(n[i], Rn)
                      , a = {
                        relatedTarget: n[i]
                    };
                    if (e && "click" === e.type && (a.clickEvent = e),
                    s) {
                        var l = s._menu;
                        if (o.classList.contains(Bn))
                            if (!(e && ("click" === e.type && /input|textarea/i.test(e.target.tagName) || "keyup" === e.type && 9 === e.which) && o.contains(e.target)))
                                $.trigger(o, Yn.HIDE, a).defaultPrevented || ("ontouchstart"in document.documentElement && v(document.body.children).forEach((function(t) {
                                    return $.off(t, "mouseover", null, (function() {}
                                    ))
                                }
                                )),
                                n[i].setAttribute("aria-expanded", "false"),
                                s._popper && s._popper.destroy(),
                                l.classList.remove(Bn),
                                o.classList.remove(Bn),
                                $.trigger(o, Yn.HIDDEN, a))
                    }
                }
        }
        ,
        t.getParentFromElement = function(t) {
            return f(t) || t.parentNode
        }
        ,
        t.dataApiKeydownHandler = function(e) {
            if (!(/input|textarea/i.test(e.target.tagName) ? 32 === e.which || 27 !== e.which && (40 !== e.which && 38 !== e.which || ct.closest(e.target, Gn)) : !Mn.test(e.which)) && (e.preventDefault(),
            e.stopPropagation(),
            !this.disabled && !this.classList.contains(Xn))) {
                var n = t.getParentFromElement(this)
                  , i = n.classList.contains(Bn);
                if (!i || i && (27 === e.which || 32 === e.which))
                    return 27 === e.which && ct.findOne(Qn, n).focus(),
                    void t.clearMenus();
                var r = v(ct.find(Jn, n)).filter(_);
                if (r.length) {
                    var o = r.indexOf(e.target);
                    38 === e.which && o > 0 && o--,
                    40 === e.which && o < r.length - 1 && o++,
                    o < 0 && (o = 0),
                    r[o].focus()
                }
            }
        }
        ,
        t.getInstance = function(t) {
            return L(t, Rn)
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return si
            }
        }, {
            key: "DefaultType",
            get: function() {
                return ai
            }
        }]),
        t
    }();
    $.on(document, Yn.KEYDOWN_DATA_API, Qn, li.dataApiKeydownHandler),
    $.on(document, Yn.KEYDOWN_DATA_API, Gn, li.dataApiKeydownHandler),
    $.on(document, Yn.CLICK_DATA_API, li.clearMenus),
    $.on(document, Yn.KEYUP_DATA_API, li.clearMenus),
    $.on(document, Yn.CLICK_DATA_API, Qn, (function(t) {
        t.preventDefault(),
        t.stopPropagation(),
        li.dropdownInterface(this, "toggle")
    }
    )),
    $.on(document, Yn.CLICK_DATA_API, zn, (function(t) {
        return t.stopPropagation()
    }
    ));
    var ci = E();
    if (ci) {
        var ui = ci.fn[jn];
        ci.fn[jn] = li.jQueryInterface,
        ci.fn[jn].Constructor = li,
        ci.fn[jn].noConflict = function() {
            return ci.fn[jn] = ui,
            li.jQueryInterface
        }
    }
    var fi = ".coreui.modal"
      , hi = {
        backdrop: !0,
        keyboard: !0,
        focus: !0,
        show: !0
    }
      , di = {
        backdrop: "(boolean|string)",
        keyboard: "boolean",
        focus: "boolean",
        show: "boolean"
    }
      , pi = {
        HIDE: "hide" + fi,
        HIDE_PREVENTED: "hidePrevented" + fi,
        HIDDEN: "hidden" + fi,
        SHOW: "show" + fi,
        SHOWN: "shown" + fi,
        FOCUSIN: "focusin" + fi,
        RESIZE: "resize" + fi,
        CLICK_DISMISS: "click.dismiss" + fi,
        KEYDOWN_DISMISS: "keydown.dismiss" + fi,
        MOUSEUP_DISMISS: "mouseup.dismiss" + fi,
        MOUSEDOWN_DISMISS: "mousedown.dismiss" + fi,
        CLICK_DATA_API: "click" + fi + ".data-api"
    }
      , gi = "modal-dialog-scrollable"
      , mi = "modal-scrollbar-measure"
      , vi = "modal-backdrop"
      , _i = "modal-open"
      , bi = "fade"
      , yi = "show"
      , Ei = "modal-static"
      , wi = ".modal-dialog"
      , Ai = ".modal-body"
      , Li = '[data-toggle="modal"]'
      , Ti = '[data-dismiss="modal"]'
      , Si = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top"
      , Oi = ".sticky-top"
      , Ci = function() {
        function t(t, e) {
            this._config = this._getConfig(e),
            this._element = t,
            this._dialog = ct.findOne(wi, t),
            this._backdrop = null,
            this._isShown = !1,
            this._isBodyOverflowing = !1,
            this._ignoreBackdropClick = !1,
            this._isTransitioning = !1,
            this._scrollbarWidth = 0,
            A(t, "coreui.modal", this)
        }
        var n = t.prototype;
        return n.toggle = function(t) {
            return this._isShown ? this.hide() : this.show(t)
        }
        ,
        n.show = function(t) {
            var e = this;
            if (!this._isShown && !this._isTransitioning) {
                this._element.classList.contains(bi) && (this._isTransitioning = !0);
                var n = $.trigger(this._element, pi.SHOW, {
                    relatedTarget: t
                });
                this._isShown || n.defaultPrevented || (this._isShown = !0,
                this._checkScrollbar(),
                this._setScrollbar(),
                this._adjustDialog(),
                this._setEscapeEvent(),
                this._setResizeEvent(),
                $.on(this._element, pi.CLICK_DISMISS, Ti, (function(t) {
                    return e.hide(t)
                }
                )),
                $.on(this._dialog, pi.MOUSEDOWN_DISMISS, (function() {
                    $.one(e._element, pi.MOUSEUP_DISMISS, (function(t) {
                        t.target === e._element && (e._ignoreBackdropClick = !0)
                    }
                    ))
                }
                )),
                this._showBackdrop((function() {
                    return e._showElement(t)
                }
                )))
            }
        }
        ,
        n.hide = function(t) {
            var e = this;
            if ((t && t.preventDefault(),
            this._isShown && !this._isTransitioning) && !$.trigger(this._element, pi.HIDE).defaultPrevented) {
                this._isShown = !1;
                var n = this._element.classList.contains(bi);
                if (n && (this._isTransitioning = !0),
                this._setEscapeEvent(),
                this._setResizeEvent(),
                $.off(document, pi.FOCUSIN),
                this._element.classList.remove(yi),
                $.off(this._element, pi.CLICK_DISMISS),
                $.off(this._dialog, pi.MOUSEDOWN_DISMISS),
                n) {
                    var i = h(this._element);
                    $.one(this._element, "transitionend", (function(t) {
                        return e._hideModal(t)
                    }
                    )),
                    g(this._element, i)
                } else
                    this._hideModal()
            }
        }
        ,
        n.dispose = function() {
            [window, this._element, this._dialog].forEach((function(t) {
                return $.off(t, fi)
            }
            )),
            $.off(document, pi.FOCUSIN),
            T(this._element, "coreui.modal"),
            this._config = null,
            this._element = null,
            this._dialog = null,
            this._backdrop = null,
            this._isShown = null,
            this._isBodyOverflowing = null,
            this._ignoreBackdropClick = null,
            this._isTransitioning = null,
            this._scrollbarWidth = null
        }
        ,
        n.handleUpdate = function() {
            this._adjustDialog()
        }
        ,
        n._getConfig = function(t) {
            return t = r({}, hi, {}, t),
            m("modal", t, di),
            t
        }
        ,
        n._showElement = function(t) {
            var e = this
              , n = this._element.classList.contains(bi)
              , i = ct.findOne(Ai, this._dialog);
            this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element),
            this._element.style.display = "block",
            this._element.removeAttribute("aria-hidden"),
            this._element.setAttribute("aria-modal", !0),
            this._dialog.classList.contains(gi) && i ? i.scrollTop = 0 : this._element.scrollTop = 0,
            n && y(this._element),
            this._element.classList.add(yi),
            this._config.focus && this._enforceFocus();
            var r = function() {
                e._config.focus && e._element.focus(),
                e._isTransitioning = !1,
                $.trigger(e._element, pi.SHOWN, {
                    relatedTarget: t
                })
            };
            if (n) {
                var o = h(this._dialog);
                $.one(this._dialog, "transitionend", r),
                g(this._dialog, o)
            } else
                r()
        }
        ,
        n._enforceFocus = function() {
            var t = this;
            $.off(document, pi.FOCUSIN),
            $.on(document, pi.FOCUSIN, (function(e) {
                document === e.target || t._element === e.target || t._element.contains(e.target) || t._element.focus()
            }
            ))
        }
        ,
        n._setEscapeEvent = function() {
            var t = this;
            this._isShown && this._config.keyboard ? $.on(this._element, pi.KEYDOWN_DISMISS, (function(e) {
                27 === e.which && t._triggerBackdropTransition()
            }
            )) : $.off(this._element, pi.KEYDOWN_DISMISS)
        }
        ,
        n._setResizeEvent = function() {
            var t = this;
            this._isShown ? $.on(window, pi.RESIZE, (function() {
                return t._adjustDialog()
            }
            )) : $.off(window, pi.RESIZE)
        }
        ,
        n._hideModal = function() {
            var t = this;
            this._element.style.display = "none",
            this._element.setAttribute("aria-hidden", !0),
            this._element.removeAttribute("aria-modal"),
            this._isTransitioning = !1,
            this._showBackdrop((function() {
                document.body.classList.remove(_i),
                t._resetAdjustments(),
                t._resetScrollbar(),
                $.trigger(t._element, pi.HIDDEN)
            }
            ))
        }
        ,
        n._removeBackdrop = function() {
            this._backdrop.parentNode.removeChild(this._backdrop),
            this._backdrop = null
        }
        ,
        n._showBackdrop = function(t) {
            var e = this
              , n = this._element.classList.contains(bi) ? bi : "";
            if (this._isShown && this._config.backdrop) {
                if (this._backdrop = document.createElement("div"),
                this._backdrop.className = vi,
                n && this._backdrop.classList.add(n),
                document.body.appendChild(this._backdrop),
                $.on(this._element, pi.CLICK_DISMISS, (function(t) {
                    e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && e._triggerBackdropTransition()
                }
                )),
                n && y(this._backdrop),
                this._backdrop.classList.add(yi),
                !n)
                    return void t();
                var i = h(this._backdrop);
                $.one(this._backdrop, "transitionend", t),
                g(this._backdrop, i)
            } else if (!this._isShown && this._backdrop) {
                this._backdrop.classList.remove(yi);
                var r = function() {
                    e._removeBackdrop(),
                    t()
                };
                if (this._element.classList.contains(bi)) {
                    var o = h(this._backdrop);
                    $.one(this._backdrop, "transitionend", r),
                    g(this._backdrop, o)
                } else
                    r()
            } else
                t()
        }
        ,
        n._triggerBackdropTransition = function() {
            var t = this;
            if ("static" === this._config.backdrop) {
                if ($.trigger(this._element, pi.HIDE_PREVENTED).defaultPrevented)
                    return;
                this._element.classList.add(Ei);
                var e = h(this._element);
                $.one(this._element, "transitionend", (function() {
                    t._element.classList.remove(Ei)
                }
                )),
                g(this._element, e),
                this._element.focus()
            } else
                this.hide()
        }
        ,
        n._adjustDialog = function() {
            var t = this._element.scrollHeight > document.documentElement.clientHeight;
            !this._isBodyOverflowing && t && (this._element.style.paddingLeft = this._scrollbarWidth + "px"),
            this._isBodyOverflowing && !t && (this._element.style.paddingRight = this._scrollbarWidth + "px")
        }
        ,
        n._resetAdjustments = function() {
            this._element.style.paddingLeft = "",
            this._element.style.paddingRight = ""
        }
        ,
        n._checkScrollbar = function() {
            var t = document.body.getBoundingClientRect();
            this._isBodyOverflowing = t.left + t.right < window.innerWidth,
            this._scrollbarWidth = this._getScrollbarWidth()
        }
        ,
        n._setScrollbar = function() {
            var t = this;
            if (this._isBodyOverflowing) {
                v(ct.find(Si)).forEach((function(e) {
                    var n = e.style.paddingRight
                      , i = window.getComputedStyle(e)["padding-right"];
                    Nt.setDataAttribute(e, "padding-right", n),
                    e.style.paddingRight = parseFloat(i) + t._scrollbarWidth + "px"
                }
                )),
                v(ct.find(Oi)).forEach((function(e) {
                    var n = e.style.marginRight
                      , i = window.getComputedStyle(e)["margin-right"];
                    Nt.setDataAttribute(e, "margin-right", n),
                    e.style.marginRight = parseFloat(i) - t._scrollbarWidth + "px"
                }
                ));
                var e = document.body.style.paddingRight
                  , n = window.getComputedStyle(document.body)["padding-right"];
                Nt.setDataAttribute(document.body, "padding-right", e),
                document.body.style.paddingRight = parseFloat(n) + this._scrollbarWidth + "px"
            }
            document.body.classList.add(_i)
        }
        ,
        n._resetScrollbar = function() {
            v(ct.find(Si)).forEach((function(t) {
                var e = Nt.getDataAttribute(t, "padding-right");
                "undefined" != typeof e && (Nt.removeDataAttribute(t, "padding-right"),
                t.style.paddingRight = e)
            }
            )),
            v(ct.find("" + Oi)).forEach((function(t) {
                var e = Nt.getDataAttribute(t, "margin-right");
                "undefined" != typeof e && (Nt.removeDataAttribute(t, "margin-right"),
                t.style.marginRight = e)
            }
            ));
            var t = Nt.getDataAttribute(document.body, "padding-right");
            "undefined" == typeof t ? document.body.style.paddingRight = "" : (Nt.removeDataAttribute(document.body, "padding-right"),
            document.body.style.paddingRight = t)
        }
        ,
        n._getScrollbarWidth = function() {
            var t = document.createElement("div");
            t.className = mi,
            document.body.appendChild(t);
            var e = t.getBoundingClientRect().width - t.clientWidth;
            return document.body.removeChild(t),
            e
        }
        ,
        t.jQueryInterface = function(e, n) {
            return this.each((function() {
                var i = L(this, "coreui.modal")
                  , o = r({}, hi, {}, Nt.getDataAttributes(this), {}, "object" == typeof e && e ? e : {});
                if (i || (i = new t(this,o)),
                "string" == typeof e) {
                    if ("undefined" == typeof i[e])
                        throw new TypeError('No method named "' + e + '"');
                    i[e](n)
                } else
                    o.show && i.show(n)
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, "coreui.modal")
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return hi
            }
        }]),
        t
    }();
    $.on(document, pi.CLICK_DATA_API, Li, (function(t) {
        var e = this
          , n = f(this);
        "A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault(),
        $.one(n, pi.SHOW, (function(t) {
            t.defaultPrevented || $.one(n, pi.HIDDEN, (function() {
                _(e) && e.focus()
            }
            ))
        }
        ));
        var i = L(n, "coreui.modal");
        if (!i) {
            var o = r({}, Nt.getDataAttributes(n), {}, Nt.getDataAttributes(this));
            i = new Ci(n,o)
        }
        i.show(this)
    }
    ));
    var Di = E();
    if (Di) {
        var Ii = Di.fn.modal;
        Di.fn.modal = Ci.jQueryInterface,
        Di.fn.modal.Constructor = Ci,
        Di.fn.modal.noConflict = function() {
            return Di.fn.modal = Ii,
            Ci.jQueryInterface
        }
    }
    var ki = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]
      , Ni = /^(?:(?:https?|mailto|ftp|tel|file):|[^&:/?#]*(?:[/?#]|$))/gi
      , Pi = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[a-z0-9+/]+=*$/i
      , Hi = {
        "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
        a: ["target", "href", "title", "rel"],
        area: [],
        b: [],
        br: [],
        col: [],
        code: [],
        div: [],
        em: [],
        hr: [],
        h1: [],
        h2: [],
        h3: [],
        h4: [],
        h5: [],
        h6: [],
        i: [],
        img: ["src", "alt", "title", "width", "height"],
        li: [],
        ol: [],
        p: [],
        pre: [],
        s: [],
        small: [],
        span: [],
        sub: [],
        sup: [],
        strong: [],
        u: [],
        ul: []
    };
    function xi(t, e, n) {
        if (!t.length)
            return t;
        if (n && "function" == typeof n)
            return n(t);
        for (var i = (new window.DOMParser).parseFromString(t, "text/html"), r = Object.keys(e), o = v(i.body.querySelectorAll("*")), s = function(t, n) {
            var i = o[t]
              , s = i.nodeName.toLowerCase();
            if (-1 === r.indexOf(s))
                return i.parentNode.removeChild(i),
                "continue";
            var a = v(i.attributes)
              , l = [].concat(e["*"] || [], e[s] || []);
            a.forEach((function(t) {
                (function(t, e) {
                    var n = t.nodeName.toLowerCase();
                    if (-1 !== e.indexOf(n))
                        return -1 === ki.indexOf(n) || Boolean(t.nodeValue.match(Ni) || t.nodeValue.match(Pi));
                    for (var i = e.filter((function(t) {
                        return t instanceof RegExp
                    }
                    )), r = 0, o = i.length; r < o; r++)
                        if (n.match(i[r]))
                            return !0;
                    return !1
                }
                )(t, l) || i.removeAttribute(t.nodeName)
            }
            ))
        }, a = 0, l = o.length; a < l; a++)
            s(a);
        return i.body.innerHTML
    }
    var ji = "tooltip"
      , Ri = ".coreui.tooltip"
      , Wi = new RegExp("(^|\\s)bs-tooltip\\S+","g")
      , Mi = ["sanitize", "whiteList", "sanitizeFn"]
      , Yi = {
        animation: "boolean",
        template: "string",
        title: "(string|element|function)",
        trigger: "string",
        delay: "(number|object)",
        html: "boolean",
        selector: "(string|boolean)",
        placement: "(string|function)",
        offset: "(number|string|function)",
        container: "(string|element|boolean)",
        fallbackPlacement: "(string|array)",
        boundary: "(string|element)",
        sanitize: "boolean",
        sanitizeFn: "(null|function)",
        whiteList: "object",
        popperConfig: "(null|object)"
    }
      , Xi = {
        AUTO: "auto",
        TOP: "top",
        RIGHT: "right",
        BOTTOM: "bottom",
        LEFT: "left"
    }
      , Bi = {
        animation: !0,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        selector: !1,
        placement: "top",
        offset: 0,
        container: !1,
        fallbackPlacement: "flip",
        boundary: "scrollParent",
        sanitize: !0,
        sanitizeFn: null,
        whiteList: Hi,
        popperConfig: null
    }
      , Ui = "show"
      , Ki = "out"
      , Vi = {
        HIDE: "hide" + Ri,
        HIDDEN: "hidden" + Ri,
        SHOW: "show" + Ri,
        SHOWN: "shown" + Ri,
        INSERTED: "inserted" + Ri,
        CLICK: "click" + Ri,
        FOCUSIN: "focusin" + Ri,
        FOCUSOUT: "focusout" + Ri,
        MOUSEENTER: "mouseenter" + Ri,
        MOUSELEAVE: "mouseleave" + Ri
    }
      , Fi = "fade"
      , qi = "modal"
      , Qi = "show"
      , zi = ".tooltip-inner"
      , Gi = "hover"
      , $i = "focus"
      , Zi = "click"
      , Ji = "manual"
      , tr = function() {
        function t(t, e) {
            if ("undefined" == typeof xn)
                throw new TypeError("Bootstrap's tooltips require Popper.js (https://popper.js.org)");
            this._isEnabled = !0,
            this._timeout = 0,
            this._hoverState = "",
            this._activeTrigger = {},
            this._popper = null,
            this.element = t,
            this.config = this._getConfig(e),
            this.tip = null,
            this._setListeners(),
            A(t, this.constructor.DATA_KEY, this)
        }
        var n = t.prototype;
        return n.enable = function() {
            this._isEnabled = !0
        }
        ,
        n.disable = function() {
            this._isEnabled = !1
        }
        ,
        n.toggleEnabled = function() {
            this._isEnabled = !this._isEnabled
        }
        ,
        n.toggle = function(t) {
            if (this._isEnabled)
                if (t) {
                    var e = this.constructor.DATA_KEY
                      , n = L(t.delegateTarget, e);
                    n || (n = new this.constructor(t.delegateTarget,this._getDelegateConfig()),
                    A(t.delegateTarget, e, n)),
                    n._activeTrigger.click = !n._activeTrigger.click,
                    n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n)
                } else {
                    if (this.getTipElement().classList.contains(Qi))
                        return void this._leave(null, this);
                    this._enter(null, this)
                }
        }
        ,
        n.dispose = function() {
            clearTimeout(this._timeout),
            T(this.element, this.constructor.DATA_KEY),
            $.off(this.element, this.constructor.EVENT_KEY),
            $.off(ct.closest(this.element, "." + qi), "hide.coreui.modal", this._hideModalHandler),
            this.tip && this.tip.parentNode.removeChild(this.tip),
            this._isEnabled = null,
            this._timeout = null,
            this._hoverState = null,
            this._activeTrigger = null,
            this._popper && this._popper.destroy(),
            this._popper = null,
            this.element = null,
            this.config = null,
            this.tip = null
        }
        ,
        n.show = function() {
            var t = this;
            if ("none" === this.element.style.display)
                throw new Error("Please use show on visible elements");
            if (this.isWithContent() && this._isEnabled) {
                var e = $.trigger(this.element, this.constructor.Event.SHOW)
                  , n = function t(e) {
                    if (!document.documentElement.attachShadow)
                        return null;
                    if ("function" == typeof e.getRootNode) {
                        var n = e.getRootNode();
                        return n instanceof ShadowRoot ? n : null
                    }
                    return e instanceof ShadowRoot ? e : e.parentNode ? t(e.parentNode) : null
                }(this.element)
                  , i = null === n ? this.element.ownerDocument.documentElement.contains(this.element) : n.contains(this.element);
                if (e.defaultPrevented || !i)
                    return;
                var r = this.getTipElement()
                  , o = l(this.constructor.NAME);
                r.setAttribute("id", o),
                this.element.setAttribute("aria-describedby", o),
                this.setContent(),
                this.config.animation && r.classList.add(Fi);
                var s = "function" == typeof this.config.placement ? this.config.placement.call(this, r, this.element) : this.config.placement
                  , a = this._getAttachment(s);
                this._addAttachmentClass(a);
                var c = this._getContainer();
                A(r, this.constructor.DATA_KEY, this),
                this.element.ownerDocument.documentElement.contains(this.tip) || c.appendChild(r),
                $.trigger(this.element, this.constructor.Event.INSERTED),
                this._popper = xn(this.element, r, this._getPopperConfig(a)),
                r.classList.add(Qi),
                "ontouchstart"in document.documentElement && v(document.body.children).forEach((function(t) {
                    $.on(t, "mouseover", (function() {}
                    ))
                }
                ));
                var u = function() {
                    t.config.animation && t._fixTransition();
                    var e = t._hoverState;
                    t._hoverState = null,
                    $.trigger(t.element, t.constructor.Event.SHOWN),
                    e === Ki && t._leave(null, t)
                };
                if (this.tip.classList.contains(Fi)) {
                    var f = h(this.tip);
                    $.one(this.tip, "transitionend", u),
                    g(this.tip, f)
                } else
                    u()
            }
        }
        ,
        n.hide = function() {
            var t = this
              , e = this.getTipElement()
              , n = function() {
                t._hoverState !== Ui && e.parentNode && e.parentNode.removeChild(e),
                t._cleanTipClass(),
                t.element.removeAttribute("aria-describedby"),
                $.trigger(t.element, t.constructor.Event.HIDDEN),
                t._popper.destroy()
            };
            if (!$.trigger(this.element, this.constructor.Event.HIDE).defaultPrevented) {
                if (e.classList.remove(Qi),
                "ontouchstart"in document.documentElement && v(document.body.children).forEach((function(t) {
                    return $.off(t, "mouseover", b)
                }
                )),
                this._activeTrigger[Zi] = !1,
                this._activeTrigger[$i] = !1,
                this._activeTrigger[Gi] = !1,
                this.tip.classList.contains(Fi)) {
                    var i = h(e);
                    $.one(e, "transitionend", n),
                    g(e, i)
                } else
                    n();
                this._hoverState = ""
            }
        }
        ,
        n.update = function() {
            null !== this._popper && this._popper.scheduleUpdate()
        }
        ,
        n.isWithContent = function() {
            return Boolean(this.getTitle())
        }
        ,
        n.getTipElement = function() {
            if (this.tip)
                return this.tip;
            var t = document.createElement("div");
            return t.innerHTML = this.config.template,
            this.tip = t.children[0],
            this.tip
        }
        ,
        n.setContent = function() {
            var t = this.getTipElement();
            this.setElementContent(ct.findOne(zi, t), this.getTitle()),
            t.classList.remove(Fi),
            t.classList.remove(Qi)
        }
        ,
        n.setElementContent = function(t, e) {
            if (null !== t)
                return "object" == typeof e && p(e) ? (e.jquery && (e = e[0]),
                void (this.config.html ? e.parentNode !== t && (t.innerHTML = "",
                t.appendChild(e)) : t.innerText = e.textContent)) : void (this.config.html ? (this.config.sanitize && (e = xi(e, this.config.whiteList, this.config.sanitizeFn)),
                t.innerHTML = e) : t.innerText = e)
        }
        ,
        n.getTitle = function() {
            var t = this.element.getAttribute("data-original-title");
            return t || (t = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title),
            t
        }
        ,
        n._getPopperConfig = function(t) {
            var e = this;
            return r({}, {
                placement: t,
                modifiers: [{
                    name: "offset",
                    options: {
                        offset: this._getOffset()
                    }
                }, {
                    name: "flip",
                    options: {
                        fallbackPlacements: this.config.fallbackPlacement
                    }
                }, {
                    name: "arrow",
                    options: {
                        element: "." + this.constructor.NAME + "-arrow"
                    }
                }, {
                    name: "preventOverflow",
                    options: {
                        boundary: this.config.boundary
                    }
                }],
                onCreate: function(t) {
                    t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t)
                },
                onUpdate: function(t) {
                    return e._handlePopperPlacementChange(t)
                }
            }, {}, this.config.popperConfig)
        }
        ,
        n._addAttachmentClass = function(t) {
            this.getTipElement().classList.add("bs-tooltip-" + t)
        }
        ,
        n._getOffset = function() {
            var t = this
              , e = {};
            return "function" == typeof this.config.offset ? e.fn = function(e) {
                return e.offsets = r({}, e.offsets, {}, t.config.offset(e.offsets, t.element) || {}),
                e
            }
            : e.offset = this.config.offset,
            e
        }
        ,
        n._getContainer = function() {
            return !1 === this.config.container ? document.body : p(this.config.container) ? this.config.container : ct.findOne(this.config.container)
        }
        ,
        n._getAttachment = function(t) {
            return Xi[t.toUpperCase()]
        }
        ,
        n._setListeners = function() {
            var t = this;
            this.config.trigger.split(" ").forEach((function(e) {
                if ("click" === e)
                    $.on(t.element, t.constructor.Event.CLICK, t.config.selector, (function(e) {
                        return t.toggle(e)
                    }
                    ));
                else if (e !== Ji) {
                    var n = e === Gi ? t.constructor.Event.MOUSEENTER : t.constructor.Event.FOCUSIN
                      , i = e === Gi ? t.constructor.Event.MOUSELEAVE : t.constructor.Event.FOCUSOUT;
                    $.on(t.element, n, t.config.selector, (function(e) {
                        return t._enter(e)
                    }
                    )),
                    $.on(t.element, i, t.config.selector, (function(e) {
                        return t._leave(e)
                    }
                    ))
                }
            }
            )),
            this._hideModalHandler = function() {
                t.element && t.hide()
            }
            ,
            $.on(ct.closest(this.element, ".modal"), "hide.coreui.modal", this._hideModalHandler),
            this.config.selector ? this.config = r({}, this.config, {
                trigger: "manual",
                selector: ""
            }) : this._fixTitle()
        }
        ,
        n._fixTitle = function() {
            var t = typeof this.element.getAttribute("data-original-title");
            (this.element.getAttribute("title") || "string" !== t) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""),
            this.element.setAttribute("title", ""))
        }
        ,
        n._enter = function(t, e) {
            var n = this.constructor.DATA_KEY;
            (e = e || L(t.delegateTarget, n)) || (e = new this.constructor(t.delegateTarget,this._getDelegateConfig()),
            A(t.delegateTarget, n, e)),
            t && (e._activeTrigger["focusin" === t.type ? $i : Gi] = !0),
            e.getTipElement().classList.contains(Qi) || e._hoverState === Ui ? e._hoverState = Ui : (clearTimeout(e._timeout),
            e._hoverState = Ui,
            e.config.delay && e.config.delay.show ? e._timeout = setTimeout((function() {
                e._hoverState === Ui && e.show()
            }
            ), e.config.delay.show) : e.show())
        }
        ,
        n._leave = function(t, e) {
            var n = this.constructor.DATA_KEY;
            (e = e || L(t.delegateTarget, n)) || (e = new this.constructor(t.delegateTarget,this._getDelegateConfig()),
            A(t.delegateTarget, n, e)),
            t && (e._activeTrigger["focusout" === t.type ? $i : Gi] = !1),
            e._isWithActiveTrigger() || (clearTimeout(e._timeout),
            e._hoverState = Ki,
            e.config.delay && e.config.delay.hide ? e._timeout = setTimeout((function() {
                e._hoverState === Ki && e.hide()
            }
            ), e.config.delay.hide) : e.hide())
        }
        ,
        n._isWithActiveTrigger = function() {
            for (var t in this._activeTrigger)
                if (this._activeTrigger[t])
                    return !0;
            return !1
        }
        ,
        n._getConfig = function(t) {
            var e = Nt.getDataAttributes(this.element);
            return Object.keys(e).forEach((function(t) {
                -1 !== Mi.indexOf(t) && delete e[t]
            }
            )),
            t && "object" == typeof t.container && t.container.jquery && (t.container = t.container[0]),
            "number" == typeof (t = r({}, this.constructor.Default, {}, e, {}, "object" == typeof t && t ? t : {})).delay && (t.delay = {
                show: t.delay,
                hide: t.delay
            }),
            "number" == typeof t.title && (t.title = t.title.toString()),
            "number" == typeof t.content && (t.content = t.content.toString()),
            m(ji, t, this.constructor.DefaultType),
            t.sanitize && (t.template = xi(t.template, t.whiteList, t.sanitizeFn)),
            t
        }
        ,
        n._getDelegateConfig = function() {
            var t = {};
            if (this.config)
                for (var e in this.config)
                    this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
            return t
        }
        ,
        n._cleanTipClass = function() {
            var t = this.getTipElement()
              , e = t.getAttribute("class").match(Wi);
            null !== e && e.length > 0 && e.map((function(t) {
                return t.trim()
            }
            )).forEach((function(e) {
                return t.classList.remove(e)
            }
            ))
        }
        ,
        n._handlePopperPlacementChange = function(t) {
            var e = t.instance;
            this.tip = e.popper,
            this._cleanTipClass(),
            this._addAttachmentClass(this._getAttachment(t.placement))
        }
        ,
        n._fixTransition = function() {
            var t = this.getTipElement()
              , e = this.config.animation;
            null === t.getAttribute("data-popper-placement") && (t.classList.remove(Fi),
            this.config.animation = !1,
            this.hide(),
            this.show(),
            this.config.animation = e)
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                var n = L(this, "coreui.tooltip")
                  , i = "object" == typeof e && e;
                if ((n || !/dispose|hide/.test(e)) && (n || (n = new t(this,i)),
                "string" == typeof e)) {
                    if ("undefined" == typeof n[e])
                        throw new TypeError('No method named "' + e + '"');
                    n[e]()
                }
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, "coreui.tooltip")
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return Bi
            }
        }, {
            key: "NAME",
            get: function() {
                return ji
            }
        }, {
            key: "DATA_KEY",
            get: function() {
                return "coreui.tooltip"
            }
        }, {
            key: "Event",
            get: function() {
                return Vi
            }
        }, {
            key: "EVENT_KEY",
            get: function() {
                return Ri
            }
        }, {
            key: "DefaultType",
            get: function() {
                return Yi
            }
        }]),
        t
    }()
      , er = E();
    if (er) {
        var nr = er.fn[ji];
        er.fn[ji] = tr.jQueryInterface,
        er.fn[ji].Constructor = tr,
        er.fn[ji].noConflict = function() {
            return er.fn[ji] = nr,
            tr.jQueryInterface
        }
    }
    var ir = "popover"
      , rr = "coreui.popover"
      , or = "." + rr
      , sr = new RegExp("(^|\\s)bs-popover\\S+","g")
      , ar = r({}, tr.Default, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
    })
      , lr = r({}, tr.DefaultType, {
        content: "(string|element|function)"
    })
      , cr = "fade"
      , ur = "show"
      , fr = ".popover-header"
      , hr = ".popover-body"
      , dr = {
        HIDE: "hide" + or,
        HIDDEN: "hidden" + or,
        SHOW: "show" + or,
        SHOWN: "shown" + or,
        INSERTED: "inserted" + or,
        CLICK: "click" + or,
        FOCUSIN: "focusin" + or,
        FOCUSOUT: "focusout" + or,
        MOUSEENTER: "mouseenter" + or,
        MOUSELEAVE: "mouseleave" + or
    }
      , pr = function(t) {
        var n, i;
        function r() {
            return t.apply(this, arguments) || this
        }
        i = t,
        (n = r).prototype = Object.create(i.prototype),
        n.prototype.constructor = n,
        n.__proto__ = i;
        var o = r.prototype;
        return o.isWithContent = function() {
            return this.getTitle() || this._getContent()
        }
        ,
        o.setContent = function() {
            var t = this.getTipElement();
            this.setElementContent(ct.findOne(fr, t), this.getTitle());
            var e = this._getContent();
            "function" == typeof e && (e = e.call(this.element)),
            this.setElementContent(ct.findOne(hr, t), e),
            t.classList.remove(cr),
            t.classList.remove(ur)
        }
        ,
        o._addAttachmentClass = function(t) {
            this.getTipElement().classList.add("bs-popover-" + t)
        }
        ,
        o._getContent = function() {
            return this.element.getAttribute("data-content") || this.config.content
        }
        ,
        o._cleanTipClass = function() {
            var t = this.getTipElement()
              , e = t.getAttribute("class").match(sr);
            null !== e && e.length > 0 && e.map((function(t) {
                return t.trim()
            }
            )).forEach((function(e) {
                return t.classList.remove(e)
            }
            ))
        }
        ,
        r.jQueryInterface = function(t) {
            return this.each((function() {
                var e = L(this, rr)
                  , n = "object" == typeof t ? t : null;
                if ((e || !/dispose|hide/.test(t)) && (e || (e = new r(this,n),
                A(this, rr, e)),
                "string" == typeof t)) {
                    if ("undefined" == typeof e[t])
                        throw new TypeError('No method named "' + t + '"');
                    e[t]()
                }
            }
            ))
        }
        ,
        r.getInstance = function(t) {
            return L(t, rr)
        }
        ,
        e(r, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return ar
            }
        }, {
            key: "NAME",
            get: function() {
                return ir
            }
        }, {
            key: "DATA_KEY",
            get: function() {
                return rr
            }
        }, {
            key: "Event",
            get: function() {
                return dr
            }
        }, {
            key: "EVENT_KEY",
            get: function() {
                return or
            }
        }, {
            key: "DefaultType",
            get: function() {
                return lr
            }
        }]),
        r
    }(tr)
      , gr = E();
    if (gr) {
        var mr = gr.fn[ir];
        gr.fn[ir] = pr.jQueryInterface,
        gr.fn[ir].Constructor = pr,
        gr.fn[ir].noConflict = function() {
            return gr.fn[ir] = mr,
            pr.jQueryInterface
        }
    }
    var vr = "scrollspy"
      , _r = "coreui.scrollspy"
      , br = {
        offset: 10,
        method: "auto",
        target: ""
    }
      , yr = {
        offset: "number",
        method: "string",
        target: "(string|element)"
    }
      , Er = {
        ACTIVATE: "activate.coreui.scrollspy",
        SCROLL: "scroll.coreui.scrollspy",
        LOAD_DATA_API: "load.coreui.scrollspy.data-api"
    }
      , wr = "dropdown-item"
      , Ar = "active"
      , Lr = '[data-spy="scroll"]'
      , Tr = ".nav, .list-group"
      , Sr = ".nav-link"
      , Or = ".nav-item"
      , Cr = ".list-group-item"
      , Dr = ".dropdown"
      , Ir = ".dropdown-toggle"
      , kr = "offset"
      , Nr = "position"
      , Pr = function() {
        function t(t, e) {
            var n = this;
            this._element = t,
            this._scrollElement = "BODY" === t.tagName ? window : t,
            this._config = this._getConfig(e),
            this._selector = this._config.target + " " + Sr + "," + this._config.target + " " + Cr + "," + this._config.target + " ." + wr,
            this._offsets = [],
            this._targets = [],
            this._activeTarget = null,
            this._scrollHeight = 0,
            $.on(this._scrollElement, Er.SCROLL, (function(t) {
                return n._process(t)
            }
            )),
            this.refresh(),
            this._process(),
            A(t, _r, this)
        }
        var n = t.prototype;
        return n.refresh = function() {
            var t = this
              , e = this._scrollElement === this._scrollElement.window ? kr : Nr
              , n = "auto" === this._config.method ? e : this._config.method
              , i = n === Nr ? this._getScrollTop() : 0;
            this._offsets = [],
            this._targets = [],
            this._scrollHeight = this._getScrollHeight(),
            v(ct.find(this._selector)).map((function(t) {
                var e, r = u(t);
                if (r && (e = ct.findOne(r)),
                e) {
                    var o = e.getBoundingClientRect();
                    if (o.width || o.height)
                        return [Nt[n](e).top + i, r]
                }
                return null
            }
            )).filter((function(t) {
                return t
            }
            )).sort((function(t, e) {
                return t[0] - e[0]
            }
            )).forEach((function(e) {
                t._offsets.push(e[0]),
                t._targets.push(e[1])
            }
            ))
        }
        ,
        n.dispose = function() {
            T(this._element, _r),
            $.off(this._scrollElement, ".coreui.scrollspy"),
            this._element = null,
            this._scrollElement = null,
            this._config = null,
            this._selector = null,
            this._offsets = null,
            this._targets = null,
            this._activeTarget = null,
            this._scrollHeight = null
        }
        ,
        n._getConfig = function(t) {
            if ("string" != typeof (t = r({}, br, {}, "object" == typeof t && t ? t : {})).target) {
                var e = t.target.id;
                e || (e = l(vr),
                t.target.id = e),
                t.target = "#" + e
            }
            return m(vr, t, yr),
            t
        }
        ,
        n._getScrollTop = function() {
            return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
        }
        ,
        n._getScrollHeight = function() {
            return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
        }
        ,
        n._getOffsetHeight = function() {
            return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
        }
        ,
        n._process = function() {
            var t = this._getScrollTop() + this._config.offset
              , e = this._getScrollHeight()
              , n = this._config.offset + e - this._getOffsetHeight();
            if (this._scrollHeight !== e && this.refresh(),
            t >= n) {
                var i = this._targets[this._targets.length - 1];
                this._activeTarget !== i && this._activate(i)
            } else {
                if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0)
                    return this._activeTarget = null,
                    void this._clear();
                for (var r = this._offsets.length; r--; ) {
                    this._activeTarget !== this._targets[r] && t >= this._offsets[r] && ("undefined" == typeof this._offsets[r + 1] || t < this._offsets[r + 1]) && this._activate(this._targets[r])
                }
            }
        }
        ,
        n._activate = function(t) {
            this._activeTarget = t,
            this._clear();
            var e = this._selector.split(",").map((function(e) {
                return e + '[data-target="' + t + '"],' + e + '[href="' + t + '"]'
            }
            ))
              , n = ct.findOne(e.join(","));
            n.classList.contains(wr) ? (ct.findOne(Ir, ct.closest(n, Dr)).classList.add(Ar),
            n.classList.add(Ar)) : (n.classList.add(Ar),
            ct.parents(n, Tr).forEach((function(t) {
                ct.prev(t, Sr + ", " + Cr).forEach((function(t) {
                    return t.classList.add(Ar)
                }
                )),
                ct.prev(t, Or).forEach((function(t) {
                    ct.children(t, Sr).forEach((function(t) {
                        return t.classList.add(Ar)
                    }
                    ))
                }
                ))
            }
            ))),
            $.trigger(this._scrollElement, Er.ACTIVATE, {
                relatedTarget: t
            })
        }
        ,
        n._clear = function() {
            v(ct.find(this._selector)).filter((function(t) {
                return t.classList.contains(Ar)
            }
            )).forEach((function(t) {
                return t.classList.remove(Ar)
            }
            ))
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                var n = L(this, _r);
                if (n || (n = new t(this,"object" == typeof e && e)),
                "string" == typeof e) {
                    if ("undefined" == typeof n[e])
                        throw new TypeError('No method named "' + e + '"');
                    n[e]()
                }
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, _r)
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return br
            }
        }]),
        t
    }();
    $.on(window, Er.LOAD_DATA_API, (function() {
        v(ct.find(Lr)).forEach((function(t) {
            return new Pr(t,Nt.getDataAttributes(t))
        }
        ))
    }
    ));
    var Hr = E();
    if (Hr) {
        var xr = Hr.fn[vr];
        Hr.fn[vr] = Pr.jQueryInterface,
        Hr.fn[vr].Constructor = Pr,
        Hr.fn[vr].noConflict = function() {
            return Hr.fn[vr] = xr,
            Pr.jQueryInterface
        }
    }
    /*!
   * perfect-scrollbar v1.5.0
   * Copyright 2020 Hyunje Jun, MDBootstrap and Contributors
   * Licensed under MIT
   */
    function jr(t) {
        return getComputedStyle(t)
    }
    function Rr(t, e) {
        for (var n in e) {
            var i = e[n];
            "number" == typeof i && (i += "px"),
            t.style[n] = i
        }
        return t
    }
    function Wr(t) {
        var e = document.createElement("div");
        return e.className = t,
        e
    }
    var Mr = "undefined" != typeof Element && (Element.prototype.matches || Element.prototype.webkitMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector);
    function Yr(t, e) {
        if (!Mr)
            throw new Error("No element matching method supported");
        return Mr.call(t, e)
    }
    function Xr(t) {
        t.remove ? t.remove() : t.parentNode && t.parentNode.removeChild(t)
    }
    function Br(t, e) {
        return Array.prototype.filter.call(t.children, (function(t) {
            return Yr(t, e)
        }
        ))
    }
    var Ur = "ps"
      , Kr = "ps__rtl"
      , Vr = {
        thumb: function(t) {
            return "ps__thumb-" + t
        },
        rail: function(t) {
            return "ps__rail-" + t
        },
        consuming: "ps__child--consume"
    }
      , Fr = {
        focus: "ps--focus",
        clicking: "ps--clicking",
        active: function(t) {
            return "ps--active-" + t
        },
        scrolling: function(t) {
            return "ps--scrolling-" + t
        }
    }
      , qr = {
        x: null,
        y: null
    };
    function Qr(t, e) {
        var n = t.element.classList
          , i = Fr.scrolling(e);
        n.contains(i) ? clearTimeout(qr[e]) : n.add(i)
    }
    function zr(t, e) {
        qr[e] = setTimeout((function() {
            return t.isAlive && t.element.classList.remove(Fr.scrolling(e))
        }
        ), t.settings.scrollingThreshold)
    }
    var Gr = function(t) {
        this.element = t,
        this.handlers = {}
    }
      , $r = {
        isEmpty: {
            configurable: !0
        }
    };
    Gr.prototype.bind = function(t, e) {
        "undefined" == typeof this.handlers[t] && (this.handlers[t] = []),
        this.handlers[t].push(e),
        this.element.addEventListener(t, e, !1)
    }
    ,
    Gr.prototype.unbind = function(t, e) {
        var n = this;
        this.handlers[t] = this.handlers[t].filter((function(i) {
            return !(!e || i === e) || (n.element.removeEventListener(t, i, !1),
            !1)
        }
        ))
    }
    ,
    Gr.prototype.unbindAll = function() {
        for (var t in this.handlers)
            this.unbind(t)
    }
    ,
    $r.isEmpty.get = function() {
        var t = this;
        return Object.keys(this.handlers).every((function(e) {
            return 0 === t.handlers[e].length
        }
        ))
    }
    ,
    Object.defineProperties(Gr.prototype, $r);
    var Zr = function() {
        this.eventElements = []
    };
    function Jr(t) {
        if ("function" == typeof window.CustomEvent)
            return new CustomEvent(t);
        var e = document.createEvent("CustomEvent");
        return e.initCustomEvent(t, !1, !1, void 0),
        e
    }
    function to(t, e, n, i, r) {
        var o;
        if (void 0 === i && (i = !0),
        void 0 === r && (r = !1),
        "top" === e)
            o = ["contentHeight", "containerHeight", "scrollTop", "y", "up", "down"];
        else {
            if ("left" !== e)
                throw new Error("A proper axis should be provided");
            o = ["contentWidth", "containerWidth", "scrollLeft", "x", "left", "right"]
        }
        !function(t, e, n, i, r) {
            var o = n[0]
              , s = n[1]
              , a = n[2]
              , l = n[3]
              , c = n[4]
              , u = n[5];
            void 0 === i && (i = !0);
            void 0 === r && (r = !1);
            var f = t.element;
            t.reach[l] = null,
            f[a] < 1 && (t.reach[l] = "start");
            f[a] > t[o] - t[s] - 1 && (t.reach[l] = "end");
            e && (f.dispatchEvent(Jr("ps-scroll-" + l)),
            e < 0 ? f.dispatchEvent(Jr("ps-scroll-" + c)) : e > 0 && f.dispatchEvent(Jr("ps-scroll-" + u)),
            i && function(t, e) {
                Qr(t, e),
                zr(t, e)
            }(t, l));
            t.reach[l] && (e || r) && f.dispatchEvent(Jr("ps-" + l + "-reach-" + t.reach[l]))
        }(t, n, o, i, r)
    }
    function eo(t) {
        return parseInt(t, 10) || 0
    }
    Zr.prototype.eventElement = function(t) {
        var e = this.eventElements.filter((function(e) {
            return e.element === t
        }
        ))[0];
        return e || (e = new Gr(t),
        this.eventElements.push(e)),
        e
    }
    ,
    Zr.prototype.bind = function(t, e, n) {
        this.eventElement(t).bind(e, n)
    }
    ,
    Zr.prototype.unbind = function(t, e, n) {
        var i = this.eventElement(t);
        i.unbind(e, n),
        i.isEmpty && this.eventElements.splice(this.eventElements.indexOf(i), 1)
    }
    ,
    Zr.prototype.unbindAll = function() {
        this.eventElements.forEach((function(t) {
            return t.unbindAll()
        }
        )),
        this.eventElements = []
    }
    ,
    Zr.prototype.once = function(t, e, n) {
        var i = this.eventElement(t)
          , r = function(t) {
            i.unbind(e, r),
            n(t)
        };
        i.bind(e, r)
    }
    ;
    var no = {
        isWebKit: "undefined" != typeof document && "WebkitAppearance"in document.documentElement.style,
        supportsTouch: "undefined" != typeof window && ("ontouchstart"in window || "maxTouchPoints"in window.navigator && window.navigator.maxTouchPoints > 0 || window.DocumentTouch && document instanceof window.DocumentTouch),
        supportsIePointer: "undefined" != typeof navigator && navigator.msMaxTouchPoints,
        isChrome: "undefined" != typeof navigator && /Chrome/i.test(navigator && navigator.userAgent)
    };
    function io(t) {
        var e = t.element
          , n = Math.floor(e.scrollTop)
          , i = e.getBoundingClientRect();
        t.containerWidth = Math.ceil(i.width),
        t.containerHeight = Math.ceil(i.height),
        t.contentWidth = e.scrollWidth,
        t.contentHeight = e.scrollHeight,
        e.contains(t.scrollbarXRail) || (Br(e, Vr.rail("x")).forEach((function(t) {
            return Xr(t)
        }
        )),
        e.appendChild(t.scrollbarXRail)),
        e.contains(t.scrollbarYRail) || (Br(e, Vr.rail("y")).forEach((function(t) {
            return Xr(t)
        }
        )),
        e.appendChild(t.scrollbarYRail)),
        !t.settings.suppressScrollX && t.containerWidth + t.settings.scrollXMarginOffset < t.contentWidth ? (t.scrollbarXActive = !0,
        t.railXWidth = t.containerWidth - t.railXMarginWidth,
        t.railXRatio = t.containerWidth / t.railXWidth,
        t.scrollbarXWidth = ro(t, eo(t.railXWidth * t.containerWidth / t.contentWidth)),
        t.scrollbarXLeft = eo((t.negativeScrollAdjustment + e.scrollLeft) * (t.railXWidth - t.scrollbarXWidth) / (t.contentWidth - t.containerWidth))) : t.scrollbarXActive = !1,
        !t.settings.suppressScrollY && t.containerHeight + t.settings.scrollYMarginOffset < t.contentHeight ? (t.scrollbarYActive = !0,
        t.railYHeight = t.containerHeight - t.railYMarginHeight,
        t.railYRatio = t.containerHeight / t.railYHeight,
        t.scrollbarYHeight = ro(t, eo(t.railYHeight * t.containerHeight / t.contentHeight)),
        t.scrollbarYTop = eo(n * (t.railYHeight - t.scrollbarYHeight) / (t.contentHeight - t.containerHeight))) : t.scrollbarYActive = !1,
        t.scrollbarXLeft >= t.railXWidth - t.scrollbarXWidth && (t.scrollbarXLeft = t.railXWidth - t.scrollbarXWidth),
        t.scrollbarYTop >= t.railYHeight - t.scrollbarYHeight && (t.scrollbarYTop = t.railYHeight - t.scrollbarYHeight),
        function(t, e) {
            var n = {
                width: e.railXWidth
            }
              , i = Math.floor(t.scrollTop);
            e.isRtl ? n.left = e.negativeScrollAdjustment + t.scrollLeft + e.containerWidth - e.contentWidth : n.left = t.scrollLeft;
            e.isScrollbarXUsingBottom ? n.bottom = e.scrollbarXBottom - i : n.top = e.scrollbarXTop + i;
            Rr(e.scrollbarXRail, n);
            var r = {
                top: i,
                height: e.railYHeight
            };
            e.isScrollbarYUsingRight ? e.isRtl ? r.right = e.contentWidth - (e.negativeScrollAdjustment + t.scrollLeft) - e.scrollbarYRight - e.scrollbarYOuterWidth - 9 : r.right = e.scrollbarYRight - t.scrollLeft : e.isRtl ? r.left = e.negativeScrollAdjustment + t.scrollLeft + 2 * e.containerWidth - e.contentWidth - e.scrollbarYLeft - e.scrollbarYOuterWidth : r.left = e.scrollbarYLeft + t.scrollLeft;
            Rr(e.scrollbarYRail, r),
            Rr(e.scrollbarX, {
                left: e.scrollbarXLeft,
                width: e.scrollbarXWidth - e.railBorderXWidth
            }),
            Rr(e.scrollbarY, {
                top: e.scrollbarYTop,
                height: e.scrollbarYHeight - e.railBorderYWidth
            })
        }(e, t),
        t.scrollbarXActive ? e.classList.add(Fr.active("x")) : (e.classList.remove(Fr.active("x")),
        t.scrollbarXWidth = 0,
        t.scrollbarXLeft = 0,
        e.scrollLeft = !0 === t.isRtl ? t.contentWidth : 0),
        t.scrollbarYActive ? e.classList.add(Fr.active("y")) : (e.classList.remove(Fr.active("y")),
        t.scrollbarYHeight = 0,
        t.scrollbarYTop = 0,
        e.scrollTop = 0)
    }
    function ro(t, e) {
        return t.settings.minScrollbarLength && (e = Math.max(e, t.settings.minScrollbarLength)),
        t.settings.maxScrollbarLength && (e = Math.min(e, t.settings.maxScrollbarLength)),
        e
    }
    function oo(t, e) {
        var n = e[0]
          , i = e[1]
          , r = e[2]
          , o = e[3]
          , s = e[4]
          , a = e[5]
          , l = e[6]
          , c = e[7]
          , u = e[8]
          , f = t.element
          , h = null
          , d = null
          , p = null;
        function g(e) {
            e.touches && e.touches[0] && (e[r] = e.touches[0].pageY),
            f[l] = h + p * (e[r] - d),
            Qr(t, c),
            io(t),
            e.stopPropagation(),
            e.preventDefault()
        }
        function m() {
            zr(t, c),
            t[u].classList.remove(Fr.clicking),
            t.event.unbind(t.ownerDocument, "mousemove", g)
        }
        function v(e, s) {
            h = f[l],
            s && e.touches && (e[r] = e.touches[0].pageY),
            d = e[r],
            p = (t[i] - t[n]) / (t[o] - t[a]),
            s ? t.event.bind(t.ownerDocument, "touchmove", g) : (t.event.bind(t.ownerDocument, "mousemove", g),
            t.event.once(t.ownerDocument, "mouseup", m),
            e.preventDefault()),
            t[u].classList.add(Fr.clicking),
            e.stopPropagation()
        }
        t.event.bind(t[s], "mousedown", (function(t) {
            v(t)
        }
        )),
        t.event.bind(t[s], "touchstart", (function(t) {
            v(t, !0)
        }
        ))
    }
    var so = {
        "click-rail": function(t) {
            t.element,
            t.event.bind(t.scrollbarY, "mousedown", (function(t) {
                return t.stopPropagation()
            }
            )),
            t.event.bind(t.scrollbarYRail, "mousedown", (function(e) {
                var n = e.pageY - window.pageYOffset - t.scrollbarYRail.getBoundingClientRect().top > t.scrollbarYTop ? 1 : -1;
                t.element.scrollTop += n * t.containerHeight,
                io(t),
                e.stopPropagation()
            }
            )),
            t.event.bind(t.scrollbarX, "mousedown", (function(t) {
                return t.stopPropagation()
            }
            )),
            t.event.bind(t.scrollbarXRail, "mousedown", (function(e) {
                var n = e.pageX - window.pageXOffset - t.scrollbarXRail.getBoundingClientRect().left > t.scrollbarXLeft ? 1 : -1;
                t.element.scrollLeft += n * t.containerWidth,
                io(t),
                e.stopPropagation()
            }
            ))
        },
        "drag-thumb": function(t) {
            oo(t, ["containerWidth", "contentWidth", "pageX", "railXWidth", "scrollbarX", "scrollbarXWidth", "scrollLeft", "x", "scrollbarXRail"]),
            oo(t, ["containerHeight", "contentHeight", "pageY", "railYHeight", "scrollbarY", "scrollbarYHeight", "scrollTop", "y", "scrollbarYRail"])
        },
        keyboard: function(t) {
            var e = t.element;
            t.event.bind(t.ownerDocument, "keydown", (function(n) {
                if (!(n.isDefaultPrevented && n.isDefaultPrevented() || n.defaultPrevented) && (Yr(e, ":hover") || Yr(t.scrollbarX, ":focus") || Yr(t.scrollbarY, ":focus"))) {
                    var i, r = document.activeElement ? document.activeElement : t.ownerDocument.activeElement;
                    if (r) {
                        if ("IFRAME" === r.tagName)
                            r = r.contentDocument.activeElement;
                        else
                            for (; r.shadowRoot; )
                                r = r.shadowRoot.activeElement;
                        if (Yr(i = r, "input,[contenteditable]") || Yr(i, "select,[contenteditable]") || Yr(i, "textarea,[contenteditable]") || Yr(i, "button,[contenteditable]"))
                            return
                    }
                    var o = 0
                      , s = 0;
                    switch (n.which) {
                    case 37:
                        o = n.metaKey ? -t.contentWidth : n.altKey ? -t.containerWidth : -30;
                        break;
                    case 38:
                        s = n.metaKey ? t.contentHeight : n.altKey ? t.containerHeight : 30;
                        break;
                    case 39:
                        o = n.metaKey ? t.contentWidth : n.altKey ? t.containerWidth : 30;
                        break;
                    case 40:
                        s = n.metaKey ? -t.contentHeight : n.altKey ? -t.containerHeight : -30;
                        break;
                    case 32:
                        s = n.shiftKey ? t.containerHeight : -t.containerHeight;
                        break;
                    case 33:
                        s = t.containerHeight;
                        break;
                    case 34:
                        s = -t.containerHeight;
                        break;
                    case 36:
                        s = t.contentHeight;
                        break;
                    case 35:
                        s = -t.contentHeight;
                        break;
                    default:
                        return
                    }
                    t.settings.suppressScrollX && 0 !== o || t.settings.suppressScrollY && 0 !== s || (e.scrollTop -= s,
                    e.scrollLeft += o,
                    io(t),
                    function(n, i) {
                        var r = Math.floor(e.scrollTop);
                        if (0 === n) {
                            if (!t.scrollbarYActive)
                                return !1;
                            if (0 === r && i > 0 || r >= t.contentHeight - t.containerHeight && i < 0)
                                return !t.settings.wheelPropagation
                        }
                        var o = e.scrollLeft;
                        if (0 === i) {
                            if (!t.scrollbarXActive)
                                return !1;
                            if (0 === o && n < 0 || o >= t.contentWidth - t.containerWidth && n > 0)
                                return !t.settings.wheelPropagation
                        }
                        return !0
                    }(o, s) && n.preventDefault())
                }
            }
            ))
        },
        wheel: function(t) {
            var e = t.element;
            function n(n) {
                var i = function(t) {
                    var e = t.deltaX
                      , n = -1 * t.deltaY;
                    return "undefined" != typeof e && "undefined" != typeof n || (e = -1 * t.wheelDeltaX / 6,
                    n = t.wheelDeltaY / 6),
                    t.deltaMode && 1 === t.deltaMode && (e *= 10,
                    n *= 10),
                    e != e && n != n && (e = 0,
                    n = t.wheelDelta),
                    t.shiftKey ? [-n, -e] : [e, n]
                }(n)
                  , r = i[0]
                  , o = i[1];
                if (!function(t, n, i) {
                    if (!no.isWebKit && e.querySelector("select:focus"))
                        return !0;
                    if (!e.contains(t))
                        return !1;
                    for (var r = t; r && r !== e; ) {
                        if (r.classList.contains(Vr.consuming))
                            return !0;
                        var o = jr(r);
                        if (i && o.overflowY.match(/(scroll|auto)/)) {
                            var s = r.scrollHeight - r.clientHeight;
                            if (s > 0 && (r.scrollTop > 0 && i < 0 || r.scrollTop < s && i > 0))
                                return !0
                        }
                        if (n && o.overflowX.match(/(scroll|auto)/)) {
                            var a = r.scrollWidth - r.clientWidth;
                            if (a > 0 && (r.scrollLeft > 0 && n < 0 || r.scrollLeft < a && n > 0))
                                return !0
                        }
                        r = r.parentNode
                    }
                    return !1
                }(n.target, r, o)) {
                    var s = !1;
                    t.settings.useBothWheelAxes ? t.scrollbarYActive && !t.scrollbarXActive ? (o ? e.scrollTop -= o * t.settings.wheelSpeed : e.scrollTop += r * t.settings.wheelSpeed,
                    s = !0) : t.scrollbarXActive && !t.scrollbarYActive && (r ? e.scrollLeft += r * t.settings.wheelSpeed : e.scrollLeft -= o * t.settings.wheelSpeed,
                    s = !0) : (e.scrollTop -= o * t.settings.wheelSpeed,
                    e.scrollLeft += r * t.settings.wheelSpeed),
                    io(t),
                    (s = s || function(n, i) {
                        var r = Math.floor(e.scrollTop)
                          , o = 0 === e.scrollTop
                          , s = r + e.offsetHeight === e.scrollHeight
                          , a = 0 === e.scrollLeft
                          , l = e.scrollLeft + e.offsetWidth === e.scrollWidth;
                        return !(Math.abs(i) > Math.abs(n) ? o || s : a || l) || !t.settings.wheelPropagation
                    }(r, o)) && !n.ctrlKey && (n.stopPropagation(),
                    n.preventDefault())
                }
            }
            "undefined" != typeof window.onwheel ? t.event.bind(e, "wheel", n) : "undefined" != typeof window.onmousewheel && t.event.bind(e, "mousewheel", n)
        },
        touch: function(t) {
            if (no.supportsTouch || no.supportsIePointer) {
                var e = t.element
                  , n = {}
                  , i = 0
                  , r = {}
                  , o = null;
                no.supportsTouch ? (t.event.bind(e, "touchstart", c),
                t.event.bind(e, "touchmove", u),
                t.event.bind(e, "touchend", f)) : no.supportsIePointer && (window.PointerEvent ? (t.event.bind(e, "pointerdown", c),
                t.event.bind(e, "pointermove", u),
                t.event.bind(e, "pointerup", f)) : window.MSPointerEvent && (t.event.bind(e, "MSPointerDown", c),
                t.event.bind(e, "MSPointerMove", u),
                t.event.bind(e, "MSPointerUp", f)))
            }
            function s(n, i) {
                e.scrollTop -= i,
                e.scrollLeft -= n,
                io(t)
            }
            function a(t) {
                return t.targetTouches ? t.targetTouches[0] : t
            }
            function l(t) {
                return (!t.pointerType || "pen" !== t.pointerType || 0 !== t.buttons) && (!(!t.targetTouches || 1 !== t.targetTouches.length) || !(!t.pointerType || "mouse" === t.pointerType || t.pointerType === t.MSPOINTER_TYPE_MOUSE))
            }
            function c(t) {
                if (l(t)) {
                    var e = a(t);
                    n.pageX = e.pageX,
                    n.pageY = e.pageY,
                    i = (new Date).getTime(),
                    null !== o && clearInterval(o)
                }
            }
            function u(o) {
                if (l(o)) {
                    var c = a(o)
                      , u = {
                        pageX: c.pageX,
                        pageY: c.pageY
                    }
                      , f = u.pageX - n.pageX
                      , h = u.pageY - n.pageY;
                    if (function(t, n, i) {
                        if (!e.contains(t))
                            return !1;
                        for (var r = t; r && r !== e; ) {
                            if (r.classList.contains(Vr.consuming))
                                return !0;
                            var o = jr(r);
                            if (i && o.overflowY.match(/(scroll|auto)/)) {
                                var s = r.scrollHeight - r.clientHeight;
                                if (s > 0 && (r.scrollTop > 0 && i < 0 || r.scrollTop < s && i > 0))
                                    return !0
                            }
                            if (n && o.overflowX.match(/(scroll|auto)/)) {
                                var a = r.scrollWidth - r.clientWidth;
                                if (a > 0 && (r.scrollLeft > 0 && n < 0 || r.scrollLeft < a && n > 0))
                                    return !0
                            }
                            r = r.parentNode
                        }
                        return !1
                    }(o.target, f, h))
                        return;
                    s(f, h),
                    n = u;
                    var d = (new Date).getTime()
                      , p = d - i;
                    p > 0 && (r.x = f / p,
                    r.y = h / p,
                    i = d),
                    function(n, i) {
                        var r = Math.floor(e.scrollTop)
                          , o = e.scrollLeft
                          , s = Math.abs(n)
                          , a = Math.abs(i);
                        if (a > s) {
                            if (i < 0 && r === t.contentHeight - t.containerHeight || i > 0 && 0 === r)
                                return 0 === window.scrollY && i > 0 && no.isChrome
                        } else if (s > a && (n < 0 && o === t.contentWidth - t.containerWidth || n > 0 && 0 === o))
                            return !0;
                        return !0
                    }(f, h) && o.preventDefault()
                }
            }
            function f() {
                t.settings.swipeEasing && (clearInterval(o),
                o = setInterval((function() {
                    t.isInitialized ? clearInterval(o) : r.x || r.y ? Math.abs(r.x) < .01 && Math.abs(r.y) < .01 ? clearInterval(o) : (s(30 * r.x, 30 * r.y),
                    r.x *= .8,
                    r.y *= .8) : clearInterval(o)
                }
                ), 10))
            }
        }
    }
      , ao = function(t, e) {
        var n = this;
        if (void 0 === e && (e = {}),
        "string" == typeof t && (t = document.querySelector(t)),
        !t || !t.nodeName)
            throw new Error("no element is specified to initialize PerfectScrollbar");
        for (var i in this.element = t,
        t.classList.add(Ur),
        this.settings = {
            handlers: ["click-rail", "drag-thumb", "keyboard", "wheel", "touch"],
            maxScrollbarLength: null,
            minScrollbarLength: null,
            scrollingThreshold: 1e3,
            scrollXMarginOffset: 0,
            scrollYMarginOffset: 0,
            suppressScrollX: !1,
            suppressScrollY: !1,
            swipeEasing: !0,
            useBothWheelAxes: !1,
            wheelPropagation: !0,
            wheelSpeed: 1
        },
        e)
            this.settings[i] = e[i];
        this.containerWidth = null,
        this.containerHeight = null,
        this.contentWidth = null,
        this.contentHeight = null;
        var r, o, s = function() {
            return t.classList.add(Fr.focus)
        }, a = function() {
            return t.classList.remove(Fr.focus)
        };
        this.isRtl = "rtl" === jr(t).direction,
        !0 === this.isRtl && t.classList.add(Kr),
        this.isNegativeScroll = (o = t.scrollLeft,
        t.scrollLeft = -1,
        r = t.scrollLeft < 0,
        t.scrollLeft = o,
        r),
        this.negativeScrollAdjustment = this.isNegativeScroll ? t.scrollWidth - t.clientWidth : 0,
        this.event = new Zr,
        this.ownerDocument = t.ownerDocument || document,
        this.scrollbarXRail = Wr(Vr.rail("x")),
        t.appendChild(this.scrollbarXRail),
        this.scrollbarX = Wr(Vr.thumb("x")),
        this.scrollbarXRail.appendChild(this.scrollbarX),
        this.scrollbarX.setAttribute("tabindex", 0),
        this.event.bind(this.scrollbarX, "focus", s),
        this.event.bind(this.scrollbarX, "blur", a),
        this.scrollbarXActive = null,
        this.scrollbarXWidth = null,
        this.scrollbarXLeft = null;
        var l = jr(this.scrollbarXRail);
        this.scrollbarXBottom = parseInt(l.bottom, 10),
        isNaN(this.scrollbarXBottom) ? (this.isScrollbarXUsingBottom = !1,
        this.scrollbarXTop = eo(l.top)) : this.isScrollbarXUsingBottom = !0,
        this.railBorderXWidth = eo(l.borderLeftWidth) + eo(l.borderRightWidth),
        Rr(this.scrollbarXRail, {
            display: "block"
        }),
        this.railXMarginWidth = eo(l.marginLeft) + eo(l.marginRight),
        Rr(this.scrollbarXRail, {
            display: ""
        }),
        this.railXWidth = null,
        this.railXRatio = null,
        this.scrollbarYRail = Wr(Vr.rail("y")),
        t.appendChild(this.scrollbarYRail),
        this.scrollbarY = Wr(Vr.thumb("y")),
        this.scrollbarYRail.appendChild(this.scrollbarY),
        this.scrollbarY.setAttribute("tabindex", 0),
        this.event.bind(this.scrollbarY, "focus", s),
        this.event.bind(this.scrollbarY, "blur", a),
        this.scrollbarYActive = null,
        this.scrollbarYHeight = null,
        this.scrollbarYTop = null;
        var c = jr(this.scrollbarYRail);
        this.scrollbarYRight = parseInt(c.right, 10),
        isNaN(this.scrollbarYRight) ? (this.isScrollbarYUsingRight = !1,
        this.scrollbarYLeft = eo(c.left)) : this.isScrollbarYUsingRight = !0,
        this.scrollbarYOuterWidth = this.isRtl ? function(t) {
            var e = jr(t);
            return eo(e.width) + eo(e.paddingLeft) + eo(e.paddingRight) + eo(e.borderLeftWidth) + eo(e.borderRightWidth)
        }(this.scrollbarY) : null,
        this.railBorderYWidth = eo(c.borderTopWidth) + eo(c.borderBottomWidth),
        Rr(this.scrollbarYRail, {
            display: "block"
        }),
        this.railYMarginHeight = eo(c.marginTop) + eo(c.marginBottom),
        Rr(this.scrollbarYRail, {
            display: ""
        }),
        this.railYHeight = null,
        this.railYRatio = null,
        this.reach = {
            x: t.scrollLeft <= 0 ? "start" : t.scrollLeft >= this.contentWidth - this.containerWidth ? "end" : null,
            y: t.scrollTop <= 0 ? "start" : t.scrollTop >= this.contentHeight - this.containerHeight ? "end" : null
        },
        this.isAlive = !0,
        this.settings.handlers.forEach((function(t) {
            return so[t](n)
        }
        )),
        this.lastScrollTop = Math.floor(t.scrollTop),
        this.lastScrollLeft = t.scrollLeft,
        this.event.bind(this.element, "scroll", (function(t) {
            return n.onScroll(t)
        }
        )),
        io(this)
    };
    ao.prototype.update = function() {
        this.isAlive && (this.negativeScrollAdjustment = this.isNegativeScroll ? this.element.scrollWidth - this.element.clientWidth : 0,
        Rr(this.scrollbarXRail, {
            display: "block"
        }),
        Rr(this.scrollbarYRail, {
            display: "block"
        }),
        this.railXMarginWidth = eo(jr(this.scrollbarXRail).marginLeft) + eo(jr(this.scrollbarXRail).marginRight),
        this.railYMarginHeight = eo(jr(this.scrollbarYRail).marginTop) + eo(jr(this.scrollbarYRail).marginBottom),
        Rr(this.scrollbarXRail, {
            display: "none"
        }),
        Rr(this.scrollbarYRail, {
            display: "none"
        }),
        io(this),
        to(this, "top", 0, !1, !0),
        to(this, "left", 0, !1, !0),
        Rr(this.scrollbarXRail, {
            display: ""
        }),
        Rr(this.scrollbarYRail, {
            display: ""
        }))
    }
    ,
    ao.prototype.onScroll = function(t) {
        this.isAlive && (io(this),
        to(this, "top", this.element.scrollTop - this.lastScrollTop),
        to(this, "left", this.element.scrollLeft - this.lastScrollLeft),
        this.lastScrollTop = Math.floor(this.element.scrollTop),
        this.lastScrollLeft = this.element.scrollLeft)
    }
    ,
    ao.prototype.destroy = function() {
        this.isAlive && (this.event.unbindAll(),
        Xr(this.scrollbarX),
        Xr(this.scrollbarY),
        Xr(this.scrollbarXRail),
        Xr(this.scrollbarYRail),
        this.removePsClasses(),
        this.element = null,
        this.scrollbarX = null,
        this.scrollbarY = null,
        this.scrollbarXRail = null,
        this.scrollbarYRail = null,
        this.isAlive = !1)
    }
    ,
    ao.prototype.removePsClasses = function() {
        this.element.className = this.element.className.split(" ").filter((function(t) {
            return !t.match(/^ps([-_].+|)$/)
        }
        )).join(" ")
    }
    ;
    var lo = "sidebar"
      , co = ".coreui.sidebar"
      , uo = {
        breakpoints: {
            xs: "c-sidebar-show",
            sm: "c-sidebar-sm-show",
            md: "c-sidebar-md-show",
            lg: "c-sidebar-lg-show",
            xl: "c-sidebar-xl-show"
        },
        dropdownAccordion: !0
    }
      , fo = {
        breakpoints: "object",
        dropdownAccordion: "(string|boolean)"
    }
      , ho = "c-active"
      , po = "c-sidebar-backdrop"
      , go = "c-fade"
      , mo = "c-sidebar-nav-dropdown"
      , vo = "c-sidebar-nav-dropdown-toggle"
      , _o = "c-show"
      , bo = "c-sidebar-minimized"
      , yo = "c-sidebar-overlaid"
      , Eo = "c-sidebar-unfoldable"
      , wo = {
        CLASS_TOGGLE: "classtoggle",
        CLICK_DATA_API: "click" + co + ".data-api",
        CLOSE: "close" + co,
        CLOSED: "closed" + co,
        LOAD_DATA_API: "load" + co + ".data-api",
        OPEN: "open" + co,
        OPENED: "opened" + co
    }
      , Ao = ".c-sidebar-nav-dropdown-toggle"
      , Lo = ".c-sidebar-nav-dropdown"
      , To = ".c-sidebar-nav-link"
      , So = ".c-sidebar-nav"
      , Oo = ".c-sidebar"
      , Co = function() {
        function t(t, e) {
            if ("undefined" == typeof ao)
                throw new TypeError("CoreUI's sidebar require Perfect Scrollbar");
            this._element = t,
            this._config = this._getConfig(e),
            this._open = this._isVisible(),
            this._mobile = this._isMobile(),
            this._overlaid = this._isOverlaid(),
            this._minimize = this._isMinimized(),
            this._unfoldable = this._isUnfoldable(),
            this._setActiveLink(),
            this._ps = null,
            this._backdrop = null,
            this._psInit(),
            this._addEventListeners(),
            A(t, "coreui.sidebar", this)
        }
        var n = t.prototype;
        return n.open = function(t) {
            var e = this;
            $.trigger(this._element, wo.OPEN),
            this._isMobile() ? (this._addClassName(this._firstBreakpointClassName()),
            this._showBackdrop(),
            $.one(this._element, "transitionend", (function() {
                e._addClickOutListener()
            }
            ))) : t ? (this._addClassName(this._getBreakpointClassName(t)),
            this._isOverlaid() && $.one(this._element, "transitionend", (function() {
                e._addClickOutListener()
            }
            ))) : (this._addClassName(this._firstBreakpointClassName()),
            this._isOverlaid() && $.one(this._element, "transitionend", (function() {
                e._addClickOutListener()
            }
            )));
            $.one(this._element, "transitionend", (function() {
                !0 === e._isVisible() && (e._open = !0,
                $.trigger(e._element, wo.OPENED))
            }
            ))
        }
        ,
        n.close = function(t) {
            var e = this;
            $.trigger(this._element, wo.CLOSE),
            this._isMobile() ? (this._element.classList.remove(this._firstBreakpointClassName()),
            this._removeBackdrop(),
            this._removeClickOutListener()) : t ? (this._element.classList.remove(this._getBreakpointClassName(t)),
            this._isOverlaid() && this._removeClickOutListener()) : (this._element.classList.remove(this._firstBreakpointClassName()),
            this._isOverlaid() && this._removeClickOutListener());
            $.one(this._element, "transitionend", (function() {
                !1 === e._isVisible() && (e._open = !1,
                $.trigger(e._element, wo.CLOSED))
            }
            ))
        }
        ,
        n.toggle = function(t) {
            this._open ? this.close(t) : this.open(t)
        }
        ,
        n.minimize = function() {
            this._isMobile() || (this._addClassName(bo),
            this._minimize = !0,
            this._psDestroy())
        }
        ,
        n.unfoldable = function() {
            this._isMobile() || (this._addClassName(Eo),
            this._unfoldable = !0)
        }
        ,
        n.reset = function() {
            this._element.classList.contains(bo) && (this._element.classList.remove(bo),
            this._minimize = !1,
            $.one(this._element, "transitionend", this._psInit())),
            this._element.classList.contains(Eo) && (this._element.classList.remove(Eo),
            this._unfoldable = !1)
        }
        ,
        n._getConfig = function(t) {
            return t = r({}, this.constructor.Default, {}, Nt.getDataAttributes(this._element), {}, t),
            m(lo, t, this.constructor.DefaultType),
            t
        }
        ,
        n._isMobile = function() {
            return Boolean(window.getComputedStyle(this._element, null).getPropertyValue("--is-mobile"))
        }
        ,
        n._isIOS = function() {
            var t = ["iPad Simulator", "iPhone Simulator", "iPod Simulator", "iPad", "iPhone", "iPod"];
            if (Boolean(navigator.platform))
                for (; t.length; )
                    if (navigator.platform === t.pop())
                        return !0;
            return !1
        }
        ,
        n._isMinimized = function() {
            return this._element.classList.contains(bo)
        }
        ,
        n._isOverlaid = function() {
            return this._element.classList.contains(yo)
        }
        ,
        n._isUnfoldable = function() {
            return this._element.classList.contains(Eo)
        }
        ,
        n._isVisible = function() {
            var t = this._element.getBoundingClientRect();
            return t.top >= 0 && t.left >= 0 && t.bottom <= (window.innerHeight || document.documentElement.clientHeight) && t.right <= (window.innerWidth || document.documentElement.clientWidth)
        }
        ,
        n._addClassName = function(t) {
            this._element.classList.add(t)
        }
        ,
        n._firstBreakpointClassName = function() {
            return Object.keys(uo.breakpoints).map((function(t) {
                return uo.breakpoints[t]
            }
            ))[0]
        }
        ,
        n._getBreakpointClassName = function(t) {
            return uo.breakpoints[t]
        }
        ,
        n._removeBackdrop = function() {
            this._backdrop && (this._backdrop.parentNode.removeChild(this._backdrop),
            this._backdrop = null)
        }
        ,
        n._showBackdrop = function() {
            this._backdrop || (this._backdrop = document.createElement("div"),
            this._backdrop.className = po,
            this._backdrop.classList.add(go),
            document.body.appendChild(this._backdrop),
            y(this._backdrop),
            this._backdrop.classList.add(_o))
        }
        ,
        n._clickOutListener = function(t, e) {
            null === t.target.closest(Oo) && (t.preventDefault(),
            t.stopPropagation(),
            e.close())
        }
        ,
        n._addClickOutListener = function() {
            var t = this;
            $.on(document, wo.CLICK_DATA_API, (function(e) {
                t._clickOutListener(e, t)
            }
            ))
        }
        ,
        n._removeClickOutListener = function() {
            $.off(document, wo.CLICK_DATA_API)
        }
        ,
        n._getAllSiblings = function(t, e) {
            var n = [];
            t = t.parentNode.firstChild;
            do {
                3 !== t.nodeType && (e && !e(t) || n.push(t))
            } while (t = t.nextSibling);return n
        }
        ,
        n._toggleDropdown = function(t, e) {
            var n = t.target;
            n.classList.contains(vo) || (n = n.closest(Ao));
            var i = n.closest(So).dataset;
            "undefined" != typeof i.dropdownAccordion && (uo.dropdownAccordion = JSON.parse(i.dropdownAccordion)),
            !0 === uo.dropdownAccordion && this._getAllSiblings(n.parentElement).forEach((function(t) {
                t !== n.parentNode && t.classList.contains(mo) && t.classList.remove(_o)
            }
            )),
            n.parentNode.classList.toggle(_o),
            e._psUpdate()
        }
        ,
        n._psInit = function() {
            this._element.querySelector(So) && !this._isIOS() && (this._ps = new ao(this._element.querySelector(So),{
                suppressScrollX: !0,
                wheelPropagation: !1
            }))
        }
        ,
        n._psUpdate = function() {
            this._ps && this._ps.update()
        }
        ,
        n._psDestroy = function() {
            this._ps && (this._ps.destroy(),
            this._ps = null)
        }
        ,
        n._getParents = function(t, e) {
            for (var n = []; t && t !== document; t = t.parentNode)
                e ? t.matches(e) && n.push(t) : n.push(t);
            return n
        }
        ,
        n._setActiveLink = function() {
            var t = this;
            Array.from(this._element.querySelectorAll(To)).forEach((function(e) {
                var n;
                "#" === (n = /\\?.*=/.test(String(window.location)) || /\\?./.test(String(window.location)) ? String(window.location).split("?")[0] : /#./.test(String(window.location)) ? String(window.location).split("#")[0] : String(window.location)).slice(-1) && (n = n.slice(0, -1)),
                e.href === n && (e.classList.add(ho),
                Array.from(t._getParents(e, Lo)).forEach((function(t) {
                    t.classList.add(_o)
                }
                )))
            }
            ))
        }
        ,
        n._addEventListeners = function() {
            var t = this;
            this._mobile && this._open && this._addClickOutListener(),
            this._overlaid && this._open && this._addClickOutListener(),
            $.on(this._element, wo.CLASS_TOGGLE, (function(e) {
                if (e.detail.className === bo && (t._element.classList.contains(bo) ? t.minimize() : t.reset()),
                e.detail.className === Eo && (t._element.classList.contains(Eo) ? t.unfoldable() : t.reset()),
                "undefined" != typeof Object.keys(uo.breakpoints).find((function(t) {
                    return uo.breakpoints[t] === e.detail.className
                }
                ))) {
                    var n = e.detail.className
                      , i = Object.keys(uo.breakpoints).find((function(t) {
                        return uo.breakpoints[t] === n
                    }
                    ));
                    e.detail.add ? t.open(i) : t.close(i)
                }
            }
            )),
            $.on(this._element, wo.CLICK_DATA_API, Ao, (function(e) {
                e.preventDefault(),
                t._toggleDropdown(e, t)
            }
            )),
            $.on(this._element, wo.CLICK_DATA_API, To, (function() {
                t._isMobile() && t.close()
            }
            ))
        }
        ,
        t._sidebarInterface = function(e, n) {
            var i = L(e, "coreui.sidebar");
            if (i || (i = new t(e,"object" == typeof n && n)),
            "string" == typeof n) {
                if ("undefined" == typeof i[n])
                    throw new TypeError('No method named "' + n + '"');
                i[n]()
            }
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                t._sidebarInterface(this, e)
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, "coreui.sidebar")
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "Default",
            get: function() {
                return uo
            }
        }, {
            key: "DefaultType",
            get: function() {
                return fo
            }
        }]),
        t
    }();
    $.on(window, wo.LOAD_DATA_API, (function() {
        Array.from(document.querySelectorAll(Oo)).forEach((function(t) {
            Co._sidebarInterface(t)
        }
        ))
    }
    ));
    var Do = E();
    if (Do) {
        var Io = Do.fn[lo];
        Do.fn[lo] = Co.jQueryInterface,
        Do.fn[lo].Constructor = Co,
        Do.fn[lo].noConflict = function() {
            return Do.fn[lo] = Io,
            Co.jQueryInterface
        }
    }
    var ko = {
        HIDE: "hide.coreui.tab",
        HIDDEN: "hidden.coreui.tab",
        SHOW: "show.coreui.tab",
        SHOWN: "shown.coreui.tab",
        CLICK_DATA_API: "click.coreui.tab.data-api"
    }
      , No = "dropdown-menu"
      , Po = "active"
      , Ho = "disabled"
      , xo = "fade"
      , jo = "show"
      , Ro = ".dropdown"
      , Wo = ".nav, .list-group"
      , Mo = ".active"
      , Yo = ":scope > li > .active"
      , Xo = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]'
      , Bo = ".dropdown-toggle"
      , Uo = ":scope > .dropdown-menu .active"
      , Ko = function() {
        function t(t) {
            this._element = t,
            A(this._element, "coreui.tab", this)
        }
        var n = t.prototype;
        return n.show = function() {
            var t = this;
            if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && this._element.classList.contains(Po) || this._element.classList.contains(Ho))) {
                var e, n = f(this._element), i = ct.closest(this._element, Wo);
                if (i) {
                    var r = "UL" === i.nodeName || "OL" === i.nodeName ? Yo : Mo;
                    e = (e = v(ct.find(r, i)))[e.length - 1]
                }
                var o = null;
                if (e && (o = $.trigger(e, ko.HIDE, {
                    relatedTarget: this._element
                })),
                !($.trigger(this._element, ko.SHOW, {
                    relatedTarget: e
                }).defaultPrevented || null !== o && o.defaultPrevented)) {
                    this._activate(this._element, i);
                    var s = function() {
                        $.trigger(e, ko.HIDDEN, {
                            relatedTarget: t._element
                        }),
                        $.trigger(t._element, ko.SHOWN, {
                            relatedTarget: e
                        })
                    };
                    n ? this._activate(n, n.parentNode, s) : s()
                }
            }
        }
        ,
        n.dispose = function() {
            T(this._element, "coreui.tab"),
            this._element = null
        }
        ,
        n._activate = function(t, e, n) {
            var i = this
              , r = (!e || "UL" !== e.nodeName && "OL" !== e.nodeName ? ct.children(e, Mo) : ct.find(Yo, e))[0]
              , o = n && r && r.classList.contains(xo)
              , s = function() {
                return i._transitionComplete(t, r, n)
            };
            if (r && o) {
                var a = h(r);
                r.classList.remove(jo),
                $.one(r, "transitionend", s),
                g(r, a)
            } else
                s()
        }
        ,
        n._transitionComplete = function(t, e, n) {
            if (e) {
                e.classList.remove(Po);
                var i = ct.findOne(Uo, e.parentNode);
                i && i.classList.remove(Po),
                "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1)
            }
            (t.classList.add(Po),
            "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0),
            y(t),
            t.classList.contains(xo) && t.classList.add(jo),
            t.parentNode && t.parentNode.classList.contains(No)) && (ct.closest(t, Ro) && v(ct.find(Bo)).forEach((function(t) {
                return t.classList.add(Po)
            }
            )),
            t.setAttribute("aria-expanded", !0));
            n && n()
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                var n = L(this, "coreui.tab") || new t(this);
                if ("string" == typeof e) {
                    if ("undefined" == typeof n[e])
                        throw new TypeError('No method named "' + e + '"');
                    n[e]()
                }
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, "coreui.tab")
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }]),
        t
    }();
    $.on(document, ko.CLICK_DATA_API, Xo, (function(t) {
        t.preventDefault(),
        (L(this, "coreui.tab") || new Ko(this)).show()
    }
    ));
    var Vo = E();
    if (Vo) {
        var Fo = Vo.fn.tab;
        Vo.fn.tab = Ko.jQueryInterface,
        Vo.fn.tab.Constructor = Ko,
        Vo.fn.tab.noConflict = function() {
            return Vo.fn.tab = Fo,
            Ko.jQueryInterface
        }
    }
    var qo, Qo, zo, Go, $o, Zo = {
        CLICK_DISMISS: "click.dismiss.coreui.toast",
        HIDE: "hide.coreui.toast",
        HIDDEN: "hidden.coreui.toast",
        SHOW: "show.coreui.toast",
        SHOWN: "shown.coreui.toast"
    }, Jo = "fade", ts = "hide", es = "show", ns = "showing", is = {
        animation: "boolean",
        autohide: "boolean",
        delay: "number"
    }, rs = {
        animation: !0,
        autohide: !0,
        delay: 500
    }, os = '[data-dismiss="toast"]', ss = function() {
        function t(t, e) {
            this._element = t,
            this._config = this._getConfig(e),
            this._timeout = null,
            this._setListeners(),
            A(t, "coreui.toast", this)
        }
        var n = t.prototype;
        return n.show = function() {
            var t = this;
            if (!$.trigger(this._element, Zo.SHOW).defaultPrevented) {
                this._config.animation && this._element.classList.add(Jo);
                var e = function() {
                    t._element.classList.remove(ns),
                    t._element.classList.add(es),
                    $.trigger(t._element, Zo.SHOWN),
                    t._config.autohide && (t._timeout = setTimeout((function() {
                        t.hide()
                    }
                    ), t._config.delay))
                };
                if (this._element.classList.remove(ts),
                y(this._element),
                this._element.classList.add(ns),
                this._config.animation) {
                    var n = h(this._element);
                    $.one(this._element, "transitionend", e),
                    g(this._element, n)
                } else
                    e()
            }
        }
        ,
        n.hide = function() {
            var t = this;
            if (this._element.classList.contains(es) && !$.trigger(this._element, Zo.HIDE).defaultPrevented) {
                var e = function() {
                    t._element.classList.add(ts),
                    $.trigger(t._element, Zo.HIDDEN)
                };
                if (this._element.classList.remove(es),
                this._config.animation) {
                    var n = h(this._element);
                    $.one(this._element, "transitionend", e),
                    g(this._element, n)
                } else
                    e()
            }
        }
        ,
        n.dispose = function() {
            clearTimeout(this._timeout),
            this._timeout = null,
            this._element.classList.contains(es) && this._element.classList.remove(es),
            $.off(this._element, Zo.CLICK_DISMISS),
            T(this._element, "coreui.toast"),
            this._element = null,
            this._config = null
        }
        ,
        n._getConfig = function(t) {
            return t = r({}, rs, {}, Nt.getDataAttributes(this._element), {}, "object" == typeof t && t ? t : {}),
            m("toast", t, this.constructor.DefaultType),
            t
        }
        ,
        n._setListeners = function() {
            var t = this;
            $.on(this._element, Zo.CLICK_DISMISS, os, (function() {
                return t.hide()
            }
            ))
        }
        ,
        t.jQueryInterface = function(e) {
            return this.each((function() {
                var n = L(this, "coreui.toast");
                if (n || (n = new t(this,"object" == typeof e && e)),
                "string" == typeof e) {
                    if ("undefined" == typeof n[e])
                        throw new TypeError('No method named "' + e + '"');
                    n[e](this)
                }
            }
            ))
        }
        ,
        t.getInstance = function(t) {
            return L(t, "coreui.toast")
        }
        ,
        e(t, null, [{
            key: "VERSION",
            get: function() {
                return "3.1.0"
            }
        }, {
            key: "DefaultType",
            get: function() {
                return is
            }
        }, {
            key: "Default",
            get: function() {
                return rs
            }
        }]),
        t
    }(), as = E();
    if (as) {
        var ls = as.fn.toast;
        as.fn.toast = ss.jQueryInterface,
        as.fn.toast.Constructor = ss,
        as.fn.toast.noConflict = function() {
            return as.fn.toast = ls,
            ss.jQueryInterface
        }
    }
    return Array.from || (Array.from = (qo = Object.prototype.toString,
    Qo = function(t) {
        return "function" == typeof t || "[object Function]" === qo.call(t)
    }
    ,
    zo = Math.pow(2, 53) - 1,
    Go = function(t) {
        var e = function(t) {
            var e = Number(t);
            return isNaN(e) ? 0 : 0 !== e && isFinite(e) ? (e > 0 ? 1 : -1) * Math.floor(Math.abs(e)) : e
        }(t);
        return Math.min(Math.max(e, 0), zo)
    }
    ,
    function(t) {
        var e = this
          , n = Object(t);
        if (null == t)
            throw new TypeError("Array.from requires an array-like object - not null or undefined");
        var i, r = arguments.length > 1 ? arguments[1] : void 0;
        if ("undefined" != typeof r) {
            if (!Qo(r))
                throw new TypeError("Array.from: when provided, the second argument must be a function");
            arguments.length > 2 && (i = arguments[2])
        }
        for (var o, s = Go(n.length), a = Qo(e) ? Object(new e(s)) : new Array(s), l = 0; l < s; )
            o = n[l],
            a[l] = r ? "undefined" == typeof i ? r(o, l) : r.call(i, o, l) : o,
            l += 1;
        return a.length = s,
        a
    }
    )),
    Element.prototype.matches || (Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector),
    Element.prototype.closest || (Element.prototype.closest = function(t) {
        var e = this;
        do {
            if (e.matches(t))
                return e;
            e = e.parentElement || e.parentNode
        } while (null !== e && 1 === e.nodeType);return null
    }
    ),
    function() {
        if ("function" == typeof window.CustomEvent)
            return !1;
        window.CustomEvent = function(t, e) {
            e = e || {
                bubbles: !1,
                cancelable: !1,
                detail: null
            };
            var n = document.createEvent("CustomEvent");
            return n.initCustomEvent(t, e.bubbles, e.cancelable, e.detail),
            n
        }
    }(),
    Element.prototype.matches || (Element.prototype.matches = Element.prototype.matchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector || Element.prototype.oMatchesSelector || Element.prototype.webkitMatchesSelector || function(t) {
        for (var e = (this.document || this.ownerDocument).querySelectorAll(t), n = e.length; --n >= 0 && e.item(n) !== this; )
            ;
        return n > -1
    }
    ),
    Array.prototype.find || Object.defineProperty(Array.prototype, "find", {
        value: function(t) {
            if (null == this)
                throw new TypeError('"this" is null or not defined');
            var e = Object(this)
              , n = e.length >>> 0;
            if ("function" != typeof t)
                throw new TypeError("predicate must be a function");
            for (var i = arguments[1], r = 0; r < n; ) {
                var o = e[r];
                if (t.call(i, o, r, e))
                    return o;
                r++
            }
        }
    }),
    "function" != typeof Object.assign && (Object.assign = function(t, e) {
        if (null == t)
            throw new TypeError("Cannot convert undefined or null to object");
        for (var n = Object(t), i = 1; i < arguments.length; i++) {
            var r = arguments[i];
            if (null != r)
                for (var o in r)
                    Object.prototype.hasOwnProperty.call(r, o) && (n[o] = r[o])
        }
        return n
    }
    ),
    $o = function() {
        function t(t) {
            var e = this.constructor;
            return this.then((function(n) {
                return e.resolve(t()).then((function() {
                    return n
                }
                ))
            }
            ), (function(n) {
                return e.resolve(t()).then((function() {
                    return e.reject(n)
                }
                ))
            }
            ))
        }
        var e = setTimeout;
        function n(t) {
            return Boolean(t && "undefined" != typeof t.length)
        }
        function i() {}
        function r(t) {
            if (!(this instanceof r))
                throw new TypeError("Promises must be constructed via new");
            if ("function" != typeof t)
                throw new TypeError("not a function");
            this._state = 0,
            this._handled = !1,
            this._value = void 0,
            this._deferreds = [],
            u(t, this)
        }
        function o(t, e) {
            for (; 3 === t._state; )
                t = t._value;
            0 !== t._state ? (t._handled = !0,
            r._immediateFn((function() {
                var n = 1 === t._state ? e.onFulfilled : e.onRejected;
                if (null !== n) {
                    var i;
                    try {
                        i = n(t._value)
                    } catch (t) {
                        return void a(e.promise, t)
                    }
                    s(e.promise, i)
                } else
                    (1 === t._state ? s : a)(e.promise, t._value)
            }
            ))) : t._deferreds.push(e)
        }
        function s(t, e) {
            try {
                if (e === t)
                    throw new TypeError("A promise cannot be resolved with itself.");
                if (e && ("object" == typeof e || "function" == typeof e)) {
                    var n = e.then;
                    if (e instanceof r)
                        return t._state = 3,
                        t._value = e,
                        void l(t);
                    if ("function" == typeof n)
                        return void u((i = n,
                        o = e,
                        function() {
                            i.apply(o, arguments)
                        }
                        ), t)
                }
                t._state = 1,
                t._value = e,
                l(t)
            } catch (e) {
                a(t, e)
            }
            var i, o
        }
        function a(t, e) {
            t._state = 2,
            t._value = e,
            l(t)
        }
        function l(t) {
            2 === t._state && 0 === t._deferreds.length && r._immediateFn((function() {
                t._handled || r._unhandledRejectionFn(t._value)
            }
            ));
            for (var e = 0, n = t._deferreds.length; e < n; e++)
                o(t, t._deferreds[e]);
            t._deferreds = null
        }
        function c(t, e, n) {
            this.onFulfilled = "function" == typeof t ? t : null,
            this.onRejected = "function" == typeof e ? e : null,
            this.promise = n
        }
        function u(t, e) {
            var n = !1;
            try {
                t((function(t) {
                    n || (n = !0,
                    s(e, t))
                }
                ), (function(t) {
                    n || (n = !0,
                    a(e, t))
                }
                ))
            } catch (t) {
                if (n)
                    return;
                n = !0,
                a(e, t)
            }
        }
        r.prototype.catch = function(t) {
            return this.then(null, t)
        }
        ,
        r.prototype.then = function(t, e) {
            var n = new this.constructor(i);
            return o(this, new c(t,e,n)),
            n
        }
        ,
        r.prototype.finally = t,
        r.all = function(t) {
            return new r((function(e, i) {
                if (!n(t))
                    return i(new TypeError("Promise.all accepts an array"));
                var r = Array.prototype.slice.call(t);
                if (0 === r.length)
                    return e([]);
                var o = r.length;
                function s(t, n) {
                    try {
                        if (n && ("object" == typeof n || "function" == typeof n)) {
                            var a = n.then;
                            if ("function" == typeof a)
                                return void a.call(n, (function(e) {
                                    s(t, e)
                                }
                                ), i)
                        }
                        r[t] = n,
                        0 == --o && e(r)
                    } catch (t) {
                        i(t)
                    }
                }
                for (var a = 0; a < r.length; a++)
                    s(a, r[a])
            }
            ))
        }
        ,
        r.resolve = function(t) {
            return t && "object" == typeof t && t.constructor === r ? t : new r((function(e) {
                e(t)
            }
            ))
        }
        ,
        r.reject = function(t) {
            return new r((function(e, n) {
                n(t)
            }
            ))
        }
        ,
        r.race = function(t) {
            return new r((function(e, i) {
                if (!n(t))
                    return i(new TypeError("Promise.race accepts an array"));
                for (var o = 0, s = t.length; o < s; o++)
                    r.resolve(t[o]).then(e, i)
            }
            ))
        }
        ,
        r._immediateFn = "function" == typeof setImmediate && function(t) {
            setImmediate(t)
        }
        || function(t) {
            e(t, 0)
        }
        ,
        r._unhandledRejectionFn = function(t) {
            "undefined" != typeof console && console && console.warn("Possible Unhandled Promise Rejection:", t)
        }
        ;
        var f = function() {
            if ("undefined" != typeof self)
                return self;
            if ("undefined" != typeof window)
                return window;
            if ("undefined" != typeof global)
                return global;
            throw new Error("unable to locate global object")
        }();
        "Promise"in f ? f.Promise.prototype.finally || (f.Promise.prototype.finally = t) : f.Promise = r
    }
    ,
    "object" == typeof exports && "undefined" != typeof module ? $o() : "function" == typeof define && define.amd ? define($o) : $o(),
    {
        AsyncLoad: st,
        Alert: pt,
        Button: Ot,
        Carousel: se,
        ClassToggler: ve,
        Collapse: He,
        Dropdown: li,
        Modal: Ci,
        Popover: pr,
        Scrollspy: Pr,
        Sidebar: Co,
        Tab: Ko,
        Toast: ss,
        Tooltip: tr
    }
}
));

