
t = null;



var GS = window.GS || {};
GS.xd = window.GS.jsRoot && window.GS.jsRoot !== "undefined" ? window["GS.jsRoot"] : "/";
GS.a = function(a) {
    return Page = {
        Q: [],
        N: {},
        c: function(a, c) {
            if (!(a == "*" || "className" in a || "id" in a) && c) throw Error("Parameters missing for GS.Page.register");
            var d = "",
                d = /:not\((.*?)\)/;
            if (d.test(a.className))
                for (var e = d.exec(a.className)[1].split(","), f = 0; f < e.length; f++) d = "." + e[f], Page.N[d] = Page.N[d] || [], Page.N[d].push(c);
            else d = a == "*" ? "*" : a.className ? "." + a.className : "#" + a.id, Page.Q[d] = Page.Q[d] || [], Page.Q[d].push(c)
        },
        Hc: function() {
            Page.da(Page.Q["*"] || []);
            for (var b = a(document.body).attr("class"), b = b ?
                    b.split(" ") : [], c = 0, d = b.length; c < d; c++) Page.da(Page.Q["." + b[c]] || []), delete Page.N["." + b[c]];
            (b = a(document.body).attr("id")) && Page.da(Page.Q["#" + b] || []);
            var b = [],
                e;
            for (e in Page.N) b = b.concat(Page.N[e]);
            Page.da(b)
        },
        da: function(a) {
            if (a)
                for (var c = 0, d = a.length; c < d; c++)
                    if (a[c] instanceof Function) a[c]();
                    else throw Error("Not a registered function");
        }
    }
}(jQuery);
window.GS = GS;
window.GS.Page = GS.a;
window.GS.Page.register = GS.a.c;
jQuery(function() {
    GS.a.Hc()
});
GS = GS || {};




GS = window.GS || {};
GS.d = function(a, b, c) {
    GS.d = function() {
        var d = !1,
            e = t,
            f = b.GS.navURL;
        this.u = function(a) {
            d = a
        };
        this.Db = function() {
            return d
        };
        this.v = function() {
            return "ontouchstart" in b && /mobi/i.test(b.navigator.userAgent) ? !0 : !1
        };
        this.Qc = function() {
            var a = decodeURIComponent((/[?|&]view=([^&;]+?)(&|#|;|$)/.exec(location.search) || [, ""])[1].replace(/\+/g, "%20")) || !1;
            a || (a = (a = c.cookie.match("(?:^|;)\\s*gsView=([^;]*)")) ? decodeURIComponent(a[1]) : !1);
            a == "mobile" ? c.cookie = "gsView=mobile; path=/" : (c.cookie = "gsView=desktop; path=/", b.gscq_isMobile = !1)
        };
        this.bc = function() {
            a("body").on({
                "mouseenter focusin": function() {
                    GS.d.v() || GS.d.u(!0)
                },
                Gd: function() {
                    GS.d.u(!0)
                }
            }, "#main-nav > li > a").on({
                             
                "mouseleave focusout": function() {
                    GS.d.v() || (a.data(this, "hover", !1), GS.d.u(!0))
                },
                click: function(b) {
                    GS.d.v() ? (a(b.target).closest("li").hasClass("has-children") || a(b.target).hasClass("toplevel")) && a(b.target).closest("li").find("ul li").length && b.preventDefault() : GS.d.u(!1)
                }
            }, "#main-nav li a").on({
                ed: function(b) {
                    a(this).parent().hasClass("active") ||
                        (a(b.target).closest("li").find("ul li").length && (b.preventDefault(), a.data(this, "hover", !0)), GS.d.u(!0));
                    GS.d.J(this, "toplevel")
                },
                "mouseenter focusin": function() {
                    GS.d.v() || (a.data(this, "hover", !0), GS.d.J(this, "toplevel"), a("#main-nav a.toplevel").addClass("expandHitArea"))
                },
                "mouseleave focusout": function() {
                    GS.d.v() || (a.data(this, "hover", !1), setTimeout(function() {
                        a("#main-nav li.active a.toplevel").length == 0 && a("#main-nav a.toplevel").removeClass("expandHitArea")
                    }, 200))
                }
            }, "#main-nav ul li a.toplevel").on("touchstart",
                "#main-nav ul li.active a.toplevel",
                function() {
                    GS.d.u(!1);
                    return !0
                }).on({
                ed: function(b) {
                    a(b.target).closest("li").find("ul li").length && (b.preventDefault(), a.data(this, "hover", !0));
                    GS.d.u(!0);
                    GS.d.J(this, "toplevel-right")
                },
                "mouseenter focusin": function() {
                    GS.d.v() || GS.d.J(this, "toplevel-right")
                },
                click: function(b) {
                    GS.d.v() ? a(b.target).closest("li").find("ul li").length && b.preventDefault() : GS.d.J(this, "toplevel-right")
                }
            })
        };
        this.J = function(b, c) {
            e && clearTimeout(e);
            var d = a(b),
                c = c || "";
            e = setTimeout(function() {
                    if (!d.data("hover")) return !1;
                    GS.d.Db() && !GS.d.v() && a("#main-nav li").each(function() {
                        a(this).removeClass("active").css({
                            "background-color": "transparent"
                        });
                        d.parents("li").addClass("active")
                    });
                    GS.d.v() && a("#main-nav li").each(function() {
                        a(this).removeClass("active").css({
                            "background-color": "transparent"
                        });
                        d.parents("li").addClass("active")
                    })
                }, c === "toplevel-right" ?
                200 : c !== "toplevel" ? 40 : 200)
        };
        this.X = function() {
            a("#main-nav li").removeClass("active");
            a("#main-nav a.toplevel").removeClass("expandHitArea")
        };
        this.jc = function() {
            a("body").on("keydown", "#wrapper", function(b) {
                b.which == 9 && a(b.target)[0] == a("#loginNav > ul >li").last().find("li").last().find("a")[0] && GS.d.X()
            }).on({
                mouseleave: function() {
                    GS.d.X()
                },
                keydown: function(c) {
                    var d = c.which;
                    a(c.target).closest("ul").children("li").index(a(c.target).parent("li"));
                    a(c.target).closest("ul").children("li");
                    (d == 27 || d == 88) && GS.d.X();
                    d == 37 && (a(c.target).hasClass("toplevel") ? a(c.target).parent("li").prev("li").length > 0 && a(c.target).parent("li").prev("li").find("a").first().focus() : a(c.target).parent("li").parent("ul").hasClass("narrowRight") ? a(c.target).parent("li").parent("ul").siblings("ul.narrowLeft").children("li").first().find("a").first().focus() : a(c.target).parent("li").parent("ul").parent("li").hasClass("sidebyside") ? a(c.target).parent("li").parent("ul").parent("li").siblings("li.sidebyside").children("ul").children("li").first().find("a").first().focus() :
                        a(c.target).parent().parent().closest("li").find("a").first().focus());
                    d == 38 && (c.preventDefault(), a(c.target).parent("li").parent("ul").children("li").first().find("a").first()[0] == a(c.target)[0] ? a(c.target).parent("li").parent("ul").parent("li").hasClass("sidebyside") ? a("#loginNav ul li.sidebyside")[0] == a(c.target).parent("li").parent("ul").parent("li")[0] ? a("#loginNav").find("a").first().focus() : a(c.target).parent("li").parent("ul").parent("li").prev("li").children("ul").children("li").find("a").last().focus() :
                        a(c.target).parent("li").parent("ul").hasClass("narrowRight") ? a(c.target).parent("li").parent("ul").prev("ul").children("li").last().find("a").first().focus() : a(c.target).parent("li").parent("ul").siblings("p")[0] == a(c.target).parent("li").parent("ul").prev()[0] ? a(c.target).parent("li").parent("ul").siblings("p").find("a").first().focus() : a(c.target).parent("li").parent("ul").siblings("a").first().focus() : a(c.target).parent("p").parent("section").siblings("a").hasClass("toplevel") ? a(c.target).parent("p").parent("section").siblings("a").focus() :
                        a(c.target).hasClass("toplevel") || a(c.target).parent().prev().find("a").first().focus());
                    if (d == 39) a(c.target).parent("li").hasClass("has-children") ? a(c.target).siblings("ul").first().children("li").first().find("a").first().focus() : a(c.target).hasClass("toplevel") ? a(c.target).parent("li").next("li").length > 0 ? a(c.target).parent("li").next("li").find("a").first().focus() : (a(c.target).parent("li").parent("ul").parent().next().find("input").first().focus(), GS.d.X()) : a(c.target).parent("li").parent("ul").hasClass("narrowLeft") ?
                        a(c.target).parent("li").parent("ul").siblings("ul.narrowRight").children("li").first().find("a").first().focus() : a(c.target).parent("li").parent("ul").parent("li").hasClass("sidebyside") ? a(c.target).parent("li").parent("ul").parent("li").siblings("li.sidebyside").children("ul").children("li").first().find("a").first().focus() : b.location = c.target;
                    d == 40 && (c.preventDefault(), a(c.target).hasClass("toplevel") ? a(c.target).siblings("section")[0] == a(c.target).next()[0] ? a(c.target).next().children("p").find("a").first().focus() :
                        a(c.target).siblings("ul").first().children("li").first().find("a").first().focus() : a(c.target).parent("li").parent("ul").parent("li").hasClass("sidebyside") && a(c.target).parent("li").parent("ul").children("li").last().find("a").first()[0] == a(c.target)[0] ? a("#loginNav ul li.sidebyside")[0] == a(c.target).parent("li").parent("ul").parent("li")[0] && a(c.target).parent("li").parent("ul").parent("li").next("li").children("ul").children("li").find("a").first().focus() : a(c.target).parent("li").parent("ul").hasClass("narrowLeft") &&
                        a(c.target).parent("li").parent("ul").children("li").find("a").last()[0] == a(c.target)[0] ? a(c.target).parent("li").parent("ul").next("ul").children("li").first().find("a").first().focus() : a(c.target).parent().next().find("a").first().focus())
                }
            }, "#main-nav").on("click", "span.navCloser", function() {
                GS.d.X()
            }).on({
                    mouseenter: function() {
                        a("#main-nav>ul>li").each(function() {
                            a(this).find("div.pullquote").first().css("z-index", "511")
                        })
                    },
                    mouseleave: function() {
                        a(".suppressNav").removeClass("suppressNav")
                    }
                },
                "#main-nav > ul > li").on({
                "mouseenter mouseover focusin": function() {
                    a(this).closest("ul").siblings("div.pullquote").css("z-index", "510")
                },
                "mouseleave mouseout focusout": function() {
                    var b = this;
                    setTimeout(function() {
                        a(b).closest("ul").find("li.active").length < 1 && a(b).parent().siblings().find("ul:visible").length < 1 && a(b).closest("ul").siblings("div.pullquote").css("z-index", "511")
                    }, 500)
                }
            }, "#main-nav > ul > li > ul > li > a, #main-nav > ul > li > ul > li > strong > a")
        };



    };
    return new GS.d
}(jQuery, this, this.document);
GS.a.c("*", GS.d.Qc);
GS.a.c("*", GS.d.jc);
GS.a.c("*", GS.d.bc);
GS.a.c({
    className: "interim-footer"
}, GS.d.ac);





