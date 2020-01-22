<!DOCTYPE html>
<html lang="id" id="facebook" class="no_js">

<head>
    <meta charset="utf-8" />
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <script>
        window._cstart = +new Date();
    </script>
    <script>
        function envFlush(a) {
            function b(b) {
                for (var c in a) b[c] = a[c]
            }
            window.requireLazy ? window.requireLazy(["Env"], b) : (window.Env = window.Env || {}, b(window.Env))
        }
        envFlush({
            "ajaxpipe_token": "AXgDjlCdkGXt1AGJ",
            "timeslice_heartbeat_config": {
                "pollIntervalMs": 33,
                "idleGapThresholdMs": 60,
                "ignoredTimesliceNames": {
                    "requestAnimationFrame": true,
                    "Event listenHandler mousemove": true,
                    "Event listenHandler mouseover": true,
                    "Event listenHandler mouseout": true,
                    "Event listenHandler scroll": true
                },
                "isHeartbeatEnabled": true,
                "isArtilleryOn": false
            },
            "shouldLogCounters": true,
            "timeslice_categories": {
                "react_render": true,
                "reflow": true
            },
            "sample_continuation_stacktraces": true,
            "dom_mutation_flag": true,
            "khsh": "0`sj`e`rm`s-0fdu^gshdoer-0gc^eurf-3gc^eurf;1;enbtldou;fduDmdldourCxO`ld-2YLMIuuqSdptdru;qsnunuxqd;rdoe-0unjdojnx-0unjdojnx0-0gdubi^rdbsduOdv-0`sj`e`r-0q`xm`r-0StoRbs`qhof-0mhoj^q`xm`r",
            "stack_trace_limit": 30,
            "deferred_stack_trace_rate": 1000,
            "timesliceBufferSize": 5000,
            "show_invariant_decoder": false,
            "isCQuick": false
        });
    </script>
    <style></style>
    <script>
        __DEV__ = 0;
        CavalryLogger = window.CavalryLogger || function(a) {
            this.lid = a, this.transition = !1, this.metric_collected = !1, this.is_detailed_profiler = !1, this.instrumentation_started = !1, this.pagelet_metrics = {}, this.events = {}, this.ongoing_watch = {}, this.values = {
                t_cstart: window._cstart
            }, this.piggy_values = {}, this.bootloader_metrics = {}, this.resource_to_pagelet_mapping = {}, this.initializeInstrumentation && this.initializeInstrumentation()
        }, CavalryLogger.prototype.setIsDetailedProfiler = function(a) {
            this.is_detailed_profiler = a;
            return this
        }, CavalryLogger.prototype.setTTIEvent = function(a) {
            this.tti_event = a;
            return this
        }, CavalryLogger.prototype.setValue = function(a, b, c, d) {
            d = d ? this.piggy_values : this.values;
            (typeof d[a] === "undefined" || c) && (d[a] = b);
            return this
        }, CavalryLogger.prototype.getLastTtiValue = function() {
            return this.lastTtiValue
        }, CavalryLogger.prototype.setTimeStamp = CavalryLogger.prototype.setTimeStamp || function(a, b, c, d) {
            this.mark(a);
            var e = this.values.t_cstart || this.values.t_start;
            e = d ? e + d : CavalryLogger.now();
            this.setValue(a, e, b, c);
            this.tti_event && a == this.tti_event && (this.lastTtiValue = e, this.setTimeStamp("t_tti", b));
            return this
        }, CavalryLogger.prototype.mark = typeof console === "object" && console.timeStamp ? function(a) {
            console.timeStamp(a)
        } : function() {}, CavalryLogger.prototype.addPiggyback = function(a, b) {
            this.piggy_values[a] = b;
            return this
        }, CavalryLogger.instances = {}, CavalryLogger.id = 0, CavalryLogger.disableArtilleryOnUntilOffLogging = !1, CavalryLogger.getInstance = function(a) {
            typeof a === "undefined" && (a = CavalryLogger.id);
            CavalryLogger.instances[a] || (CavalryLogger.instances[a] = new CavalryLogger(a));
            return CavalryLogger.instances[a]
        }, CavalryLogger.setPageID = function(a) {
            if (CavalryLogger.id === 0) {
                var b = CavalryLogger.getInstance();
                CavalryLogger.instances[a] = b;
                CavalryLogger.instances[a].lid = a;
                delete CavalryLogger.instances[0]
            }
            CavalryLogger.id = a
        }, CavalryLogger.now = function() {
            return window.performance && performance.timing && performance.timing.navigationStart && performance.now ? performance.now() + performance.timing.navigationStart : new Date().getTime()
        }, CavalryLogger.prototype.measureResources = function() {}, CavalryLogger.prototype.profileEarlyResources = function() {}, CavalryLogger.getBootloaderMetricsFromAllLoggers = function() {}, CavalryLogger.start_js = function() {}, CavalryLogger.done_js = function() {};
        CavalryLogger.getInstance().setTTIEvent("t_domcontent");
        CavalryLogger.prototype.measureResources = function(a, b) {
            if (!this.log_resources) return;
            var c = "bootload/" + a.name;
            if (this.bootloader_metrics[c] !== void 0 || this.ongoing_watch[c] !== void 0) return;
            var d = CavalryLogger.now();
            this.ongoing_watch[c] = d;
            "start_" + c in this.bootloader_metrics || (this.bootloader_metrics["start_" + c] = d);
            b && !("tag_" + c in this.bootloader_metrics) && (this.bootloader_metrics["tag_" + c] = b);
            if (a.type === "js") {
                c = "js_exec/" + a.name;
                this.ongoing_watch[c] = d
            }
        }, CavalryLogger.prototype.stopWatch = function(a) {
            if (this.ongoing_watch[a]) {
                var b = CavalryLogger.now(),
                    c = b - this.ongoing_watch[a];
                this.bootloader_metrics[a] = c;
                var d = this.piggy_values;
                a.indexOf("bootload") === 0 && (d.t_resource_download || (d.t_resource_download = 0), d.resources_downloaded || (d.resources_downloaded = 0), d.t_resource_download += c, d.resources_downloaded += 1, d["tag_" + a] == "_EF_" && (d.t_pagelet_cssload_early_resources = b));
                delete this.ongoing_watch[a]
            }
            return this
        }, CavalryLogger.getBootloaderMetricsFromAllLoggers = function() {
            var a = {};
            Object.values(window.CavalryLogger.instances).forEach(function(b) {
                b.bootloader_metrics && Object.assign(a, b.bootloader_metrics)
            });
            return a
        }, CavalryLogger.start_js = function(a) {
            for (var b = 0; b < a.length; ++b) CavalryLogger.getInstance().stopWatch("js_exec/" + a[b])
        }, CavalryLogger.done_js = function(a) {
            for (var b = 0; b < a.length; ++b) CavalryLogger.getInstance().stopWatch("bootload/" + a[b])
        }, CavalryLogger.prototype.profileEarlyResources = function(a) {
            for (var b = 0; b < a.length; b++) this.measureResources({
                name: a[b][0],
                type: a[b][1] ? "js" : ""
            }, "_EF_")
        };
        CavalryLogger.getInstance().log_resources = true;
        CavalryLogger.getInstance().setIsDetailedProfiler(true);
        window.CavalryLogger && CavalryLogger.getInstance().setTimeStamp("t_start");
    </script><noscript>
        <meta http-equiv="refresh" content="0; URL=/?_fb_noscript=1" /></noscript>
    <title id="pageTitle">Facebook - Masuk atau Daftar</title>
    <meta property="og:site_name" content="Facebook" />
    <meta property="og:url" content="https://www.facebook.com/" />
    <meta property="og:image" content="https://www.facebook.com/images/fb_icon_325x325.png" />
    <meta property="og:locale" content="id_ID" />
    <link rel="search" type="application/opensearchdescription+xml" href="/osd.xml" title="Facebook" />
    <link rel="canonical" href="https://www.facebook.com/" />
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.facebook.com/" />
    <link rel="alternate" media="handheld" href="https://m.facebook.com/" />
    <link rel="alternate" hreflang="x-default" href="https://www.facebook.com/" />
    <link rel="alternate" hreflang="en" href="https://www.facebook.com/" />
    <link rel="alternate" hreflang="ar" href="https://ar-ar.facebook.com/" />
    <link rel="alternate" hreflang="bg" href="https://bg-bg.facebook.com/" />
    <link rel="alternate" hreflang="bs" href="https://bs-ba.facebook.com/" />
    <link rel="alternate" hreflang="ca" href="https://ca-es.facebook.com/" />
    <link rel="alternate" hreflang="da" href="https://da-dk.facebook.com/" />
    <link rel="alternate" hreflang="el" href="https://el-gr.facebook.com/" />
    <link rel="alternate" hreflang="es" href="https://es-la.facebook.com/" />
    <link rel="alternate" hreflang="es-es" href="https://es-es.facebook.com/" />
    <link rel="alternate" hreflang="fa" href="https://fa-ir.facebook.com/" />
    <link rel="alternate" hreflang="fi" href="https://fi-fi.facebook.com/" />
    <link rel="alternate" hreflang="fr" href="https://fr-fr.facebook.com/" />
    <link rel="alternate" hreflang="fr-ca" href="https://fr-ca.facebook.com/" />
    <link rel="alternate" hreflang="hi" href="https://hi-in.facebook.com/" />
    <link rel="alternate" hreflang="hr" href="https://hr-hr.facebook.com/" />
    <link rel="alternate" hreflang="id" href="https://id-id.facebook.com/" />
    <link rel="alternate" hreflang="it" href="https://it-it.facebook.com/" />
    <link rel="alternate" hreflang="ko" href="https://ko-kr.facebook.com/" />
    <link rel="alternate" hreflang="mk" href="https://mk-mk.facebook.com/" />
    <link rel="alternate" hreflang="ms" href="https://ms-my.facebook.com/" />
    <link rel="alternate" hreflang="pl" href="https://pl-pl.facebook.com/" />
    <link rel="alternate" hreflang="pt" href="https://pt-br.facebook.com/" />
    <link rel="alternate" hreflang="pt-pt" href="https://pt-pt.facebook.com/" />
    <link rel="alternate" hreflang="ro" href="https://ro-ro.facebook.com/" />
    <link rel="alternate" hreflang="sl" href="https://sl-si.facebook.com/" />
    <link rel="alternate" hreflang="sr" href="https://sr-rs.facebook.com/" />
    <link rel="alternate" hreflang="th" href="https://th-th.facebook.com/" />
    <link rel="alternate" hreflang="vi" href="https://vi-vn.facebook.com/" />
    <meta name="description" content="Buat akun atau masuk ke Facebook. Terhubunglah dengan teman, keluarga, dan orang lain yang Anda kenal. Bagikan foto dan video, kirim pesan, dan dapatkan..." />
    <meta name="robots" content="noodp,noydir" />
    <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yo/r/iRmz9lCMBD2.ico" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/y8/l/0,cross/BK-C_lPrdQ8.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="UI8W7" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yZ/l/0,cross/qsX_Ksn2aLy.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="JIEfU" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/ye/l/0,cross/sh7umBU0wXg.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="ipo9U" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yM/l/0,cross/-aNOUTy5sxc.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="gcfsm" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/y8/l/0,cross/MpERXrF7puh.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="9heBT" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yA/l/0,cross/cIiwU5js-D-.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="ch1+J" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yT/l/0,cross/G-XnQ-BZVcj.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="3zv1z" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/y2/l/0,cross/lZ86cv9aR90.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="f+J2L" crossorigin="anonymous" />
    <script src="https://static.xx.fbcdn.net/rsrc.php/v3/y-/r/Fz5v19ZcjPB.js?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="rzIsp" crossorigin="anonymous"></script>
    <script>
        requireLazy(["gkx"], function(gkx) {
            gkx.add({
                "676837": {
                    "result": false,
                    "hash": "AT4lOcBpHHTpGwNe"
                },
                "946894": {
                    "result": false,
                    "hash": "AT5tm155BVN8E36d"
                },
                "676920": {
                    "result": false,
                    "hash": "AT4A1WkgZXee5Lhm"
                },
                "676921": {
                    "result": false,
                    "hash": "AT5bbi7YIXbH8MQY"
                },
                "676922": {
                    "result": false,
                    "hash": "AT4MlXW9YavnFBuR"
                },
                "1073500": {
                    "result": true,
                    "hash": "AT6GdubNw8UhNmZU"
                },
                "1113247": {
                    "result": false,
                    "hash": "AT7HNpg4hMlDhYHR"
                },
                "708253": {
                    "result": false,
                    "hash": "AT72rMj6PR5FVneI"
                }
            });
        });
        require("TimeSliceImpl").guard(function() {
            (require("ServerJSDefine")).handleDefines([
                ["cr:696703", [], {
                    "__rc": [null, "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:708886", ["EventProfilerImpl"], {
                    "__rc": ["EventProfilerImpl", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:717822", ["TimeSliceImpl"], {
                    "__rc": ["TimeSliceImpl", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:806696", ["clearTimeoutBlue"], {
                    "__rc": ["clearTimeoutBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:807042", ["setTimeoutBlue"], {
                    "__rc": ["setTimeoutBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:896462", ["setIntervalAcrossTransitionsBlue"], {
                    "__rc": ["setIntervalAcrossTransitionsBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:925100", ["RunBlue"], {
                    "__rc": ["RunBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:986633", ["setTimeoutAcrossTransitionsBlue"], {
                    "__rc": ["setTimeoutAcrossTransitionsBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:1003267", ["clearIntervalBlue"], {
                    "__rc": ["clearIntervalBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:1100101", ["requestAnimationFrameAcrossTransitionsSimple"], {
                    "__rc": ["requestAnimationFrameAcrossTransitionsSimple", "Aa2Izh_Eu593V8PIFUawcFesV_1MDgstEp0R7vZoYu8RYSjQ2xITInRLsO6e7UsqcML5tAU"]
                }, -1],
                ["cr:896461", ["setIntervalBlue"], {
                    "__rc": ["setIntervalBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:1000292", ["BanzaiNew"], {
                    "__rc": ["BanzaiNew", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:729414", [], {
                    "__rc": [null, "Aa133thCgQhRBLbUqwkgYaksxQYMPP3l5Vwez7S8RO-_glf2d3l04HmZQmsHZjwxGoczoCWW8_Z9xeRE4gtY"]
                }, -1],
                ["cr:692209", ["cancelIdleCallbackBlue"], {
                    "__rc": ["cancelIdleCallbackBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                }, -1],
                ["cr:695720", ["SnappyCompressUtil"], {
                    "__rc": ["SnappyCompressUtil", "Aa0oseub2W40hFRE9HNXfC6O_ijWrXFJNZBehfGxnxZ121WkU_Tdp_oeMHAl6JzCJaTtFSd3zzDIB1toYp-pfzVSom0"]
                }, -1],
                ["URLFragmentPreludeConfig", [], {
                    "hashtagRedirect": true,
                    "fragBlacklist": ["nonce", "access_token", "oauth_token", "xs", "checkpoint_data", "code"]
                }, 137],
                ["BigPipeExperiments", [], {
                    "link_images_to_pagelets": false,
                    "enable_bigpipe_plugins": false
                }, 907],
                ["BootloaderConfig", [], {
                    "jsRetries": null,
                    "jsRetryAbortNum": 2,
                    "jsRetryAbortTime": 5,
                    "payloadEndpointURI": "https:\/\/www.facebook.com\/ajax\/bootloader-endpoint\/",
                    "preloadBE": false,
                    "assumeNotNonblocking": false,
                    "shouldCoalesceModuleRequestsMadeInSameTick": true,
                    "staggerJsDownloads": false,
                    "preloader_num_preloads": 0,
                    "preloader_preload_after_dd": false,
                    "preloader_num_loads": 1,
                    "preloader_enabled": false,
                    "retryQueuedBootloads": false,
                    "silentDups": false,
                    "asyncPreloadBoost": true
                }, 329],
                ["CSSLoaderConfig", [], {
                    "timeout": 5000,
                    "modulePrefix": "BLCSS:",
                    "loadEventSupported": true
                }, 619],
                ["CookieCoreConfig", [], {
                    "a11y": {
                        "s": "None"
                    },
                    "act": {
                        "s": "Lax"
                    },
                    "c_user": {
                        "s": "None"
                    },
                    "ddid": {
                        "p": "\/deferreddeeplink\/",
                        "t": 2419200,
                        "s": "None"
                    },
                    "dpr": {
                        "t": 604800,
                        "s": "None"
                    },
                    "js_ver": {
                        "t": 604800,
                        "s": "None"
                    },
                    "locale": {
                        "t": 604800,
                        "s": "None"
                    },
                    "lh": {
                        "t": 604800,
                        "s": "None"
                    },
                    "m_pixel_ratio": {
                        "t": 604800,
                        "s": "None"
                    },
                    "noscript": {
                        "s": "None"
                    },
                    "pnl_data2": {
                        "t": 2,
                        "s": "None"
                    },
                    "presence": {
                        "s": "None"
                    },
                    "sfau": {
                        "s": "None"
                    },
                    "wd": {
                        "t": 604800,
                        "s": "None"
                    },
                    "x-referer": {
                        "s": "None"
                    },
                    "x-src": {
                        "t": 1,
                        "s": "None"
                    }
                }, 2104],
                ["CurrentCommunityInitialData", [], {}, 490],
                ["CurrentEnvironment", [], {
                    "facebookdotcom": true,
                    "messengerdotcom": false
                }, 827],
                ["CurrentUserInitialData", [], {
                    "USER_ID": "0",
                    "ACCOUNT_ID": "0",
                    "NAME": "",
                    "SHORT_NAME": null,
                    "IS_MESSENGER_ONLY_USER": false,
                    "IS_DEACTIVATED_ALLOWED_ON_MESSENGER": false,
                    "APP_ID": "256281040558"
                }, 270],
                ["DTSGInitialData", [], {}, 258],
                ["ISB", [], {}, 330],
                ["LSD", [], {
                    "token": "AVrCjF91"
                }, 323],
                ["ServerNonce", [], {
                    "ServerNonce": "vCaJh9psZbxsoI2fjseaM6"
                }, 141],
                ["SiteData", [], {
                    "server_revision": 1001324297,
                    "client_revision": 1001324297,
                    "tier": "",
                    "push_phase": "C3",
                    "pkg_cohort": "PHASED:DEFAULT",
                    "pr": 1,
                    "haste_site": "www",
                    "be_mode": 1,
                    "be_key": "__be",
                    "ir_on": true,
                    "is_rtl": false,
                    "is_comet": false,
                    "hsi": "6750514078989294257-0",
                    "spin": 4,
                    "__spin_r": 1001324297,
                    "__spin_b": "trunk",
                    "__spin_t": 1571726538,
                    "vip": "157.240.25.35"
                }, 317],
                ["SprinkleConfig", [], {
                    "param_name": "jazoest",
                    "version": 2,
                    "should_randomize": false
                }, 2111],
                ["UserAgentData", [], {
                    "browserArchitecture": "64",
                    "browserFullVersion": "77.0.3865.120",
                    "browserMinorVersion": 0,
                    "browserName": "Chrome",
                    "browserVersion": 77,
                    "deviceName": "Unknown",
                    "engineName": "WebKit",
                    "engineVersion": "537.36",
                    "platformArchitecture": "64",
                    "platformName": "Linux",
                    "platformVersion": null,
                    "platformFullVersion": null
                }, 527],
                ["PromiseUsePolyfillSetImmediateGK", [], {
                    "www_always_use_polyfill_setimmediate": false
                }, 2190],
                ["CookieCoreLoggingConfig", [], {
                    "maximumIgnorableStallMs": 16.67,
                    "sampleRate": 9.7e-5,
                    "sampleRateClassic": 1.0e-10,
                    "sampleRateFastStale": 1.0e-8
                }, 3401],
                ["ImmediateImplementationExperiments", [], {
                    "prefer_message_channel": true
                }, 3419],
                ["DTSGInitData", [], {
                    "token": "",
                    "async_get_token": ""
                }, 3515],
                ["UriNeedRawQuerySVConfig", [], {
                    "uris": ["dms.netmng.com", "doubleclick.net", "r.msn.com", "watchit.sky.com", "graphite.instagram.com", "www.kfc.co.th", "learn.pantheon.io", "www.landmarkshops.in", "www.ncl.com", "s0.wp.com", "www.tatacliq.com", "bs.serving-sys.com", "kohls.com", "lazada.co.th", "xg4ken.com", "technopark.ru", "officedepot.com.mx", "bestbuy.com.mx"]
                }, 3871],
                ["InitialCookieConsent", [], {
                    "deferCookies": false,
                    "noCookies": false,
                    "shouldShowCookieBanner": false
                }, 4328],
                ["TrustedTypesConfig", [], {
                    "useTrustedTypes": false,
                    "reportOnly": true
                }, 4548],
                ["ArtilleryExperiments", [], {
                    "artillery_static_resources_pagelet_attribution": false,
                    "artillery_timeslice_compressed_data": false,
                    "artillery_miny_client_payload": false,
                    "artillery_prolong_page_tracing": false,
                    "artillery_navigation_timing_level_2": false,
                    "artillery_profiler_on": false,
                    "artillery_merge_max_distance_sec": 1,
                    "artillery_merge_max_duration_sec": 1,
                    "user_timing": false
                }, 1237],
                ["EventConfig", [], {
                    "sampling": {
                        "bandwidth": 0,
                        "play": 0,
                        "playing": 0,
                        "progress": 0,
                        "pause": 0,
                        "ended": 0,
                        "seeked": 0,
                        "seeking": 0,
                        "waiting": 0,
                        "loadedmetadata": 0,
                        "canplay": 0,
                        "selectionchange": 0,
                        "change": 0,
                        "timeupdate": 2000000,
                        "adaptation": 0,
                        "focus": 0,
                        "blur": 0,
                        "load": 0,
                        "error": 0,
                        "message": 0,
                        "abort": 0,
                        "storage": 0,
                        "scroll": 200000,
                        "mousemove": 20000,
                        "mouseover": 10000,
                        "mouseout": 10000,
                        "mousewheel": 1,
                        "MSPointerMove": 10000,
                        "keydown": 0.1,
                        "click": 0.02,
                        "mouseup": 0.02,
                        "__100ms": 0.001,
                        "__default": 5000,
                        "__min": 100,
                        "__interactionDefault": 200,
                        "__eventDefault": 100000
                    },
                    "page_sampling_boost": 1,
                    "interaction_regexes": {
                        "BlueBarAccountChevronMenu": " _5lxs(?: .*)?$",
                        "BlueBarHomeButton": " _bluebarLinkHome__interaction-root(?: .*)?$",
                        "BlueBarProfileLink": " _1k67(?: .*)?$",
                        "ReactComposerSproutMedia": " _1pnt(?: .*)?$",
                        "ReactComposerSproutAlbum": " _1pnu(?: .*)?$",
                        "ReactComposerSproutNote": " _3-9x(?: .*)?$",
                        "ReactComposerSproutLocation": " _1pnv(?: .*)?$",
                        "ReactComposerSproutActivity": " _1pnz(?: .*)?$",
                        "ReactComposerSproutPeople": " _1pn-(?: .*)?$",
                        "ReactComposerSproutLiveVideo": " _5tv7(?: .*)?$",
                        "ReactComposerSproutMarkdown": " _311p(?: .*)?$",
                        "ReactComposerSproutFormattedText": " _mwg(?: .*)?$",
                        "ReactComposerSproutSticker": " _2vri(?: .*)?$",
                        "ReactComposerSproutSponsor": " _5t5q(?: .*)?$",
                        "ReactComposerSproutEllipsis": " _1gr3(?: .*)?$",
                        "ReactComposerSproutContactYourRepresentative": " _3cnv(?: .*)?$",
                        "ReactComposerSproutFunFact": " _2_xs(?: .*)?$",
                        "TextExposeSeeMoreLink": " see_more_link(?: .*)?$",
                        "SnowliftBigCloseButton": "(?: _xlt(?: .*)? _418x(?: .*)?$| _418x(?: .*)? _xlt(?: .*)?$)",
                        "SnowliftPrevPager": "(?: snowliftPager(?: .*)? prev(?: .*)?$| prev(?: .*)? snowliftPager(?: .*)?$)",
                        "SnowliftNextPager": "(?: snowliftPager(?: .*)? next(?: .*)?$| next(?: .*)? snowliftPager(?: .*)?$)",
                        "SnowliftFullScreenButton": "#fbPhotoSnowliftFullScreenSwitch( .+)*",
                        "PrivacySelectorMenu": "(?: _57di(?: .*)? _2wli(?: .*)?$| _2wli(?: .*)? _57di(?: .*)?$)",
                        "ReactComposerFeedXSprouts": " _nh6(?: .*)?$",
                        "SproutsComposerStatusTab": " _sg1(?: .*)?$",
                        "SproutsComposerLiveVideoTab": " _sg1(?: .*)?$",
                        "SproutsComposerAlbumTab": " _sg1(?: .*)?$",
                        "composerAudienceSelector": " _ej0(?: .*)?$",
                        "FeedHScrollAttachmentsPrevPager": " _1qqy(?: .*)?$",
                        "FeedHScrollAttachmentsNextPager": " _1qqz(?: .*)?$",
                        "DockChatTabFlyout": " fbDockChatTabFlyout(?: .*)?$",
                        "PrivacyLiteJewel": " _59fc(?: .*)?$",
                        "ActorSelector": " _6vh(?: .*)?$",
                        "LegacyMentionsInput": "(?: ReactLegacyMentionsInput(?: .*)? uiMentionsInput(?: .*)? _2xwx(?: .*)?$| uiMentionsInput(?: .*)? ReactLegacyMentionsInput(?: .*)? _2xwx(?: .*)?$| _2xwx(?: .*)? ReactLegacyMentionsInput(?: .*)? uiMentionsInput(?: .*)?$| ReactLegacyMentionsInput(?: .*)? _2xwx(?: .*)? uiMentionsInput(?: .*)?$| uiMentionsInput(?: .*)? _2xwx(?: .*)? ReactLegacyMentionsInput(?: .*)?$| _2xwx(?: .*)? uiMentionsInput(?: .*)? ReactLegacyMentionsInput(?: .*)?$)",
                        "UFIActionLinksEmbedLink": " _2g1w(?: .*)?$",
                        "UFIPhotoAttachLink": " UFIPhotoAttachLinkWrapper(?: .*)?$",
                        "UFIMentionsInputProxy": " _1osa(?: .*)?$",
                        "UFIMentionsInputDummy": " _1osc(?: .*)?$",
                        "UFIOrderingModeSelector": " _3scp(?: .*)?$",
                        "UFIPager": "(?: UFIPagerRow(?: .*)? UFIRow(?: .*)?$| UFIRow(?: .*)? UFIPagerRow(?: .*)?$)",
                        "UFIReplyRow": "(?: UFIReplyRow(?: .*)? UFICommentReply(?: .*)?$| UFICommentReply(?: .*)? UFIReplyRow(?: .*)?$)",
                        "UFIReplySocialSentence": " UFIReplySocialSentenceRow(?: .*)?$",
                        "UFIShareLink": " _5f9b(?: .*)?$",
                        "UFIStickerButton": " UFICommentStickerButton(?: .*)?$",
                        "MentionsInput": " _5yk1(?: .*)?$",
                        "FantaChatTabRoot": " _3_9e(?: .*)?$",
                        "SnowliftViewableRoot": " _2-sx(?: .*)?$",
                        "ReactBlueBarJewelButton": " _5fwr(?: .*)?$",
                        "UFIReactionsDialogLayerImpl": " _1oxk(?: .*)?$",
                        "UFIReactionsLikeLinkImpl": " _4x9_(?: .*)?$",
                        "UFIReactionsLinkImplRoot": " _khz(?: .*)?$",
                        "Reaction": " _iuw(?: .*)?$",
                        "UFIReactionsMenuImpl": " _iu-(?: .*)?$",
                        "UFIReactionsSpatialReactionIconContainer": " _1fq9(?: .*)?$",
                        "VideoComponentPlayButton": " _bsl(?: .*)?$",
                        "FeedOptionsPopover": " _b1e(?: .*)?$",
                        "UFICommentLikeCount": " UFICommentLikeButton(?: .*)?$",
                        "UFICommentLink": " _5yxe(?: .*)?$",
                        "ChatTabComposerInputContainer": " _552h(?: .*)?$",
                        "ChatTabHeader": " _15p4(?: .*)?$",
                        "DraftEditor": " _5rp7(?: .*)?$",
                        "ChatSideBarDropDown": " _5vm9(?: .*)?$",
                        "SearchBox": " _539-(?: .*)?$",
                        "ChatSideBarLink": " _55ln(?: .*)?$",
                        "MessengerSearchTypeahead": " _3rh8(?: .*)?$",
                        "NotificationListItem": " _33c(?: .*)?$",
                        "MessageJewelListItem": " messagesContent(?: .*)?$",
                        "Messages_Jewel_Button": " _3eo8(?: .*)?$",
                        "Notifications_Jewel_Button": " _3eo9(?: .*)?$",
                        "snowliftopen": " _342u(?: .*)?$",
                        "NoteTextSeeMoreLink": " _3qd_(?: .*)?$",
                        "fbFeedOptionsPopover": " _1he6(?: .*)?$",
                        "Requests_Jewel_Button": " _3eoa(?: .*)?$",
                        "UFICommentActionLinkAjaxify": " _15-3(?: .*)?$",
                        "UFICommentActionLinkRedirect": " _15-6(?: .*)?$",
                        "UFICommentActionLinkDispatched": " _15-7(?: .*)?$",
                        "UFICommentCloseButton": " _36rj(?: .*)?$",
                        "UFICommentActionsRemovePreview": " _460h(?: .*)?$",
                        "UFICommentActionsReply": " _460i(?: .*)?$",
                        "UFICommentActionsSaleItemMessage": " _460j(?: .*)?$",
                        "UFICommentActionsAcceptAnswer": " _460k(?: .*)?$",
                        "UFICommentActionsUnacceptAnswer": " _460l(?: .*)?$",
                        "UFICommentReactionsLikeLink": " _3-me(?: .*)?$",
                        "UFICommentMenu": " _1-be(?: .*)?$",
                        "UFIMentionsInputFallback": " _289b(?: .*)?$",
                        "UFIMentionsInputComponent": " _289c(?: .*)?$",
                        "UFIMentionsInputProxyInput": " _432z(?: .*)?$",
                        "UFIMentionsInputProxyDummy": " _432-(?: .*)?$",
                        "UFIPrivateReplyLinkMessage": " _14hj(?: .*)?$",
                        "UFIPrivateReplyLinkSeeReply": " _14hk(?: .*)?$",
                        "ChatCloseButton": " _4vu4(?: .*)?$",
                        "ChatTabComposerPhotoUploader": " _13f-(?: .*)?$",
                        "ChatTabComposerGroupPollingButton": " _13f_(?: .*)?$",
                        "ChatTabComposerGames": " _13ga(?: .*)?$",
                        "ChatTabComposerPlan": " _13gb(?: .*)?$",
                        "ChatTabComposerFileUploader": " _13gd(?: .*)?$",
                        "ChatTabStickersButton": " _13ge(?: .*)?$",
                        "ChatTabComposerGifButton": " _13gf(?: .*)?$",
                        "ChatTabComposerEmojiPicker": " _13gg(?: .*)?$",
                        "ChatTabComposerLikeButton": " _13gi(?: .*)?$",
                        "ChatTabComposerP2PButton": " _13gj(?: .*)?$",
                        "ChatTabComposerQuickCam": " _13gk(?: .*)?$",
                        "ChatTabHeaderAudioRTCButton": " _461a(?: .*)?$",
                        "ChatTabHeaderVideoRTCButton": " _461b(?: .*)?$",
                        "ChatTabHeaderOptionsButton": " _461_(?: .*)?$",
                        "ChatTabHeaderAddToThreadButton": " _4620(?: .*)?$",
                        "ReactComposerMediaSprout": " _fk5(?: .*)?$",
                        "UFIReactionsBlingSocialSentenceComments": " _-56(?: .*)?$",
                        "UFIReactionsBlingSocialSentenceSeens": " _2x0l(?: .*)?$",
                        "UFIReactionsBlingSocialSentenceShares": " _2x0m(?: .*)?$",
                        "UFIReactionsBlingSocialSentenceViews": " _-5c(?: .*)?$",
                        "UFIReactionsBlingSocialSentence": " _-5d(?: .*)?$",
                        "UFIReactionsSocialSentence": " _1vaq(?: .*)?$",
                        "VideoFullscreenButton": " _39ip(?: .*)?$",
                        "Tahoe": " _400z(?: .*)?$",
                        "TahoeFromVideoPlayer": " _1vek(?: .*)?$",
                        "TahoeFromVideoLink": " _2-40(?: .*)?$",
                        "TahoeFromPhoto": " _2ju5(?: .*)?$",
                        "FBStoryTrayItem": " _1fvw(?: .*)?$",
                        "Mobile_Feed_Jewel_Button": "#feed_jewel( .+)*",
                        "Mobile_Requests_Jewel_Button": "#requests_jewel( .+)*",
                        "Mobile_Messages_Jewel_Button": "#messages_jewel( .+)*",
                        "Mobile_Notifications_Jewel_Button": "#notifications_jewel( .+)*",
                        "Mobile_Search_Jewel_Button": "#search_jewel( .+)*",
                        "Mobile_Bookmarks_Jewel_Button": "#bookmarks_jewel( .+)*",
                        "Mobile_Feed_UFI_Comment_Button_Permalink": " _l-a(?: .*)?$",
                        "Mobile_Feed_UFI_Comment_Button_Flyout": " _4qeq(?: .*)?$",
                        "Mobile_Feed_UFI_Token_Bar_Flyout": " _4qer(?: .*)?$",
                        "Mobile_Feed_UFI_Token_Bar_Permalink": " _4-09(?: .*)?$",
                        "Mobile_UFI_Share_Button": " _15kr(?: .*)?$",
                        "Mobile_Feed_Photo_Permalink": " _1mh-(?: .*)?$",
                        "Mobile_Feed_Video_Permalink": " _65g_(?: .*)?$",
                        "Mobile_Feed_Profile_Permalink": " _4kk6(?: .*)?$",
                        "Mobile_Feed_Story_Permalink": " _26yo(?: .*)?$",
                        "Mobile_Feed_Page_Permalink": " _4e81(?: .*)?$",
                        "Mobile_Feed_Group_Permalink": " _20u1(?: .*)?$",
                        "Mobile_Feed_Event_Permalink": " _20u0(?: .*)?$",
                        "ProfileIntroCardAddFeaturedMedia": " _30qr(?: .*)?$",
                        "ProfileSectionAbout": " _84wb(?: .*)?$",
                        "ProfileSectionAllRelationships": " _84wc(?: .*)?$",
                        "ProfileSectionAtWork": " _2fnv(?: .*)?$",
                        "ProfileSectionContactBasic": " _84vf(?: .*)?$",
                        "ProfileSectionEducation": " _84vh(?: .*)?$",
                        "ProfileSectionOverview": " _84vj(?: .*)?$",
                        "ProfileSectionPlaces": " _84vg(?: .*)?$",
                        "ProfileSectionYearOverviews": " _84vi(?: .*)?$",
                        "IntlPolyglotHomepage": " _Interaction__IntlPolyglotVoteActivityCardButton(?: .*)?$",
                        "ProtonElementSelection": " _67ft(?: .*)?$"
                    },
                    "interaction_boost": {
                        "SnowliftPrevPager": 0.2,
                        "SnowliftNextPager": 0.2,
                        "ChatSideBarLink": 2,
                        "MessengerSearchTypeahead": 2,
                        "Messages_Jewel_Button": 2.5,
                        "Notifications_Jewel_Button": 1.5,
                        "Tahoe": 30,
                        "ProtonElementSelection": 4
                    },
                    "event_types": {
                        "BlueBarAccountChevronMenu": ["click"],
                        "BlueBarHomeButton": ["click"],
                        "BlueBarProfileLink": ["click"],
                        "ReactComposerSproutMedia": ["click"],
                        "ReactComposerSproutAlbum": ["click"],
                        "ReactComposerSproutNote": ["click"],
                        "ReactComposerSproutLocation": ["click"],
                        "ReactComposerSproutActivity": ["click"],
                        "ReactComposerSproutPeople": ["click"],
                        "ReactComposerSproutLiveVideo": ["click"],
                        "ReactComposerSproutMarkdown": ["click"],
                        "ReactComposerSproutFormattedText": ["click"],
                        "ReactComposerSproutSticker": ["click"],
                        "ReactComposerSproutSponsor": ["click"],
                        "ReactComposerSproutEllipsis": ["click"],
                        "ReactComposerSproutContactYourRepresentative": ["click"],
                        "ReactComposerSproutFunFact": ["click"],
                        "TextExposeSeeMoreLink": ["click"],
                        "SnowliftBigCloseButton": ["click"],
                        "SnowliftPrevPager": ["click"],
                        "SnowliftNextPager": ["click"],
                        "SnowliftFullScreenButton": ["click"],
                        "PrivacySelectorMenu": ["click"],
                        "ReactComposerFeedXSprouts": ["click"],
                        "SproutsComposerStatusTab": ["click"],
                        "SproutsComposerLiveVideoTab": ["click"],
                        "SproutsComposerAlbumTab": ["click"],
                        "composerAudienceSelector": ["click"],
                        "FeedHScrollAttachmentsPrevPager": ["click"],
                        "FeedHScrollAttachmentsNextPager": ["click"],
                        "DockChatTabFlyout": ["click"],
                        "PrivacyLiteJewel": ["click"],
                        "ActorSelector": ["click"],
                        "LegacyMentionsInput": ["click"],
                        "UFIActionLinksEmbedLink": ["click"],
                        "UFIPhotoAttachLink": ["click"],
                        "UFIMentionsInputProxy": ["click"],
                        "UFIMentionsInputDummy": ["click"],
                        "UFIOrderingModeSelector": ["click"],
                        "UFIPager": ["click"],
                        "UFIReplyRow": ["click"],
                        "UFIReplySocialSentence": ["click"],
                        "UFIShareLink": ["click"],
                        "UFIStickerButton": ["click"],
                        "MentionsInput": ["click"],
                        "FantaChatTabRoot": ["click"],
                        "SnowliftViewableRoot": ["click"],
                        "ReactBlueBarJewelButton": ["click"],
                        "UFIReactionsDialogLayerImpl": ["click"],
                        "UFIReactionsLikeLinkImpl": ["click"],
                        "UFIReactionsLinkImplRoot": ["click"],
                        "Reaction": ["click"],
                        "UFIReactionsMenuImpl": ["click"],
                        "UFIReactionsSpatialReactionIconContainer": ["click"],
                        "VideoComponentPlayButton": ["click"],
                        "FeedOptionsPopover": ["click"],
                        "UFICommentLikeCount": ["click"],
                        "UFICommentLink": ["click"],
                        "ChatTabComposerInputContainer": ["click"],
                        "ChatTabHeader": ["click"],
                        "DraftEditor": ["click"],
                        "ChatSideBarDropDown": ["click"],
                        "SearchBox": ["click"],
                        "ChatSideBarLink": ["mouseup"],
                        "MessengerSearchTypeahead": ["click"],
                        "NotificationListItem": ["click"],
                        "MessageJewelListItem": ["click"],
                        "Messages_Jewel_Button": ["click"],
                        "Notifications_Jewel_Button": ["click"],
                        "snowliftopen": ["click"],
                        "NoteTextSeeMoreLink": ["click"],
                        "fbFeedOptionsPopover": ["click"],
                        "Requests_Jewel_Button": ["click"],
                        "UFICommentActionLinkAjaxify": ["click"],
                        "UFICommentActionLinkRedirect": ["click"],
                        "UFICommentActionLinkDispatched": ["click"],
                        "UFICommentCloseButton": ["click"],
                        "UFICommentActionsRemovePreview": ["click"],
                        "UFICommentActionsReply": ["click"],
                        "UFICommentActionsSaleItemMessage": ["click"],
                        "UFICommentActionsAcceptAnswer": ["click"],
                        "UFICommentActionsUnacceptAnswer": ["click"],
                        "UFICommentReactionsLikeLink": ["click"],
                        "UFICommentMenu": ["click"],
                        "UFIMentionsInputFallback": ["click"],
                        "UFIMentionsInputComponent": ["click"],
                        "UFIMentionsInputProxyInput": ["click"],
                        "UFIMentionsInputProxyDummy": ["click"],
                        "UFIPrivateReplyLinkMessage": ["click"],
                        "UFIPrivateReplyLinkSeeReply": ["click"],
                        "ChatCloseButton": ["click"],
                        "ChatTabComposerPhotoUploader": ["click"],
                        "ChatTabComposerGroupPollingButton": ["click"],
                        "ChatTabComposerGames": ["click"],
                        "ChatTabComposerPlan": ["click"],
                        "ChatTabComposerFileUploader": ["click"],
                        "ChatTabStickersButton": ["click"],
                        "ChatTabComposerGifButton": ["click"],
                        "ChatTabComposerEmojiPicker": ["click"],
                        "ChatTabComposerLikeButton": ["click"],
                        "ChatTabComposerP2PButton": ["click"],
                        "ChatTabComposerQuickCam": ["click"],
                        "ChatTabHeaderAudioRTCButton": ["click"],
                        "ChatTabHeaderVideoRTCButton": ["click"],
                        "ChatTabHeaderOptionsButton": ["click"],
                        "ChatTabHeaderAddToThreadButton": ["click"],
                        "ReactComposerMediaSprout": ["click"],
                        "UFIReactionsBlingSocialSentenceComments": ["click"],
                        "UFIReactionsBlingSocialSentenceSeens": ["click"],
                        "UFIReactionsBlingSocialSentenceShares": ["click"],
                        "UFIReactionsBlingSocialSentenceViews": ["click"],
                        "UFIReactionsBlingSocialSentence": ["click"],
                        "UFIReactionsSocialSentence": ["click"],
                        "VideoFullscreenButton": ["click"],
                        "Tahoe": ["click"],
                        "TahoeFromVideoPlayer": ["click"],
                        "TahoeFromVideoLink": ["click"],
                        "TahoeFromPhoto": ["click"],
                        "": ["click"],
                        "FBStoryTrayItem": ["click"],
                        "Mobile_Feed_Jewel_Button": ["click"],
                        "Mobile_Requests_Jewel_Button": ["click"],
                        "Mobile_Messages_Jewel_Button": ["click"],
                        "Mobile_Notifications_Jewel_Button": ["click"],
                        "Mobile_Search_Jewel_Button": ["click"],
                        "Mobile_Bookmarks_Jewel_Button": ["click"],
                        "Mobile_Feed_UFI_Comment_Button_Permalink": ["click"],
                        "Mobile_Feed_UFI_Comment_Button_Flyout": ["click"],
                        "Mobile_Feed_UFI_Token_Bar_Flyout": ["click"],
                        "Mobile_Feed_UFI_Token_Bar_Permalink": ["click"],
                        "Mobile_UFI_Share_Button": ["click"],
                        "Mobile_Feed_Photo_Permalink": ["click"],
                        "Mobile_Feed_Video_Permalink": ["click"],
                        "Mobile_Feed_Profile_Permalink": ["click"],
                        "Mobile_Feed_Story_Permalink": ["click"],
                        "Mobile_Feed_Page_Permalink": ["click"],
                        "Mobile_Feed_Group_Permalink": ["click"],
                        "Mobile_Feed_Event_Permalink": ["click"],
                        "ProfileIntroCardAddFeaturedMedia": ["click"],
                        "ProfileSectionAbout": ["click"],
                        "ProfileSectionAllRelationships": ["click"],
                        "ProfileSectionAtWork": ["click"],
                        "ProfileSectionContactBasic": ["click"],
                        "ProfileSectionEducation": ["click"],
                        "ProfileSectionOverview": ["click"],
                        "ProfileSectionPlaces": ["click"],
                        "ProfileSectionYearOverviews": ["click"],
                        "IntlPolyglotHomepage": ["click"],
                        "ProtonElementSelection": ["click"]
                    },
                    "manual_instrumentation": false,
                    "profile_eager_execution": true,
                    "disable_heuristic": true,
                    "disable_event_profiler": false
                }, 1726],
                ["AdsInterfacesSessionConfig", [], {}, 2393],
                ["TimeSliceInteractionSV", [], {
                    "on_demand_reference_counting": true,
                    "on_demand_profiling_counters": true,
                    "default_rate": 1000,
                    "lite_default_rate": 100,
                    "interaction_to_lite_coinflip": {
                        "ADS_INTERFACES_INTERACTION": 0,
                        "ads_perf_scenario": 0,
                        "ads_wait_time": 0,
                        "Event": 1,
                        "video_psr": 0,
                        "video_stall": 0
                    },
                    "interaction_to_coinflip": {
                        "ADS_INTERFACES_INTERACTION": 1,
                        "ads_perf_scenario": 1,
                        "ads_wait_time": 1,
                        "video_psr": 1000000,
                        "video_stall": 2500000,
                        "Event": 100,
                        "pixelcloud_view_performance": 25,
                        "intern_notify_inbox_page_load": 10,
                        "intern_notify_jewel_list_load": 10,
                        "tasks_initial_page_load": 1,
                        "watch_carousel_left_scroll": 1,
                        "watch_carousel_right_scroll": 1,
                        "watch_sections_load_more": 1,
                        "watch_discover_scroll": 1,
                        "fbpkg_ui": 1,
                        "sevmanager_powersearch_initial_page_load": 10,
                        "network_ui": 1,
                        "daiquery_interactive_query": 1
                    },
                    "enable_heartbeat": true,
                    "maxBlockMergeDuration": 0,
                    "maxBlockMergeDistance": 0,
                    "enable_banzai_stream": true,
                    "user_timing_coinflip": 50,
                    "banzai_stream_coinflip": 1,
                    "compression_enabled": true,
                    "ref_counting_fix": false,
                    "ref_counting_cont_fix": false,
                    "also_record_new_timeslice_format": false,
                    "force_async_request_tracing_on": false
                }, 2609],
                ["BanzaiConfig", [], {
                    "EXPIRY": 86400000,
                    "MAX_SIZE": 10000,
                    "MAX_WAIT": 150000,
                    "RESTORE_WAIT": 150000,
                    "blacklist": ["time_spent"],
                    "gks": {
                        "boosted_component": true,
                        "boosted_pagelikes": true,
                        "jslogger": true,
                        "mercury_send_error_logging": true,
                        "platform_oauth_client_events": true,
                        "xtrackable_clientview_batch": true,
                        "visibility_tracking": true,
                        "graphexplorer": true,
                        "gqls_web_logging": true,
                        "sticker_search_ranking": true
                    }
                }, 7],
                ["ZeroRewriteRules", [], {
                    "rewrite_rules": {},
                    "whitelist": {
                        "\/hr\/r": 1,
                        "\/hr\/p": 1,
                        "\/zero\/unsupported_browser\/": 1,
                        "\/zero\/policy\/optin": 1,
                        "\/zero\/optin\/write\/": 1,
                        "\/zero\/optin\/legal\/": 1,
                        "\/zero\/optin\/free\/": 1,
                        "\/about\/privacy\/": 1,
                        "\/about\/privacy\/update\/": 1,
                        "\/about\/privacy\/update": 1,
                        "\/zero\/toggle\/welcome\/": 1,
                        "\/zero\/toggle\/nux\/": 1,
                        "\/fup\/interstitial\/": 1,
                        "\/work\/landing": 1,
                        "\/work\/login\/": 1,
                        "\/work\/email\/": 1,
                        "\/ai.php": 1,
                        "\/js_dialog_resources\/dialog_descriptions_android.json": 0,
                        "\/connect\/jsdialog\/MPlatformAppInvitesJSDialog\/": 0,
                        "\/connect\/jsdialog\/MPlatformOAuthShimJSDialog\/": 0,
                        "\/connect\/jsdialog\/MPlatformLikeJSDialog\/": 0,
                        "\/qp\/interstitial\/": 1,
                        "\/qp\/action\/redirect\/": 1,
                        "\/qp\/action\/close\/": 1,
                        "\/zero\/support\/ineligible\/": 1,
                        "\/zero_balance_redirect\/": 1,
                        "\/zero_balance_redirect": 1,
                        "\/l.php": 1,
                        "\/lsr.php": 1,
                        "\/ajax\/dtsg\/": 1,
                        "\/checkpoint\/block\/": 1,
                        "\/exitdsite": 1,
                        "\/zero\/balance\/pixel\/": 1,
                        "\/zero\/balance\/": 1,
                        "\/zero\/balance\/carrier_landing\/": 1,
                        "\/zero\/flex\/logging\/": 1,
                        "\/tr": 1,
                        "\/tr\/": 1,
                        "\/sem_campaigns\/sem_pixel_test\/": 1,
                        "\/bookmarks\/flyout\/body\/": 1,
                        "\/zero\/subno\/": 1,
                        "\/confirmemail.php": 1,
                        "\/policies\/": 1,
                        "\/mobile\/internetdotorg\/classifier\/": 1,
                        "\/zero\/dogfooding": 1,
                        "\/xti.php": 1,
                        "\/zero\/fblite\/config\/": 1,
                        "\/lite\/": 1,
                        "\/hr\/zsh\/wc\/": 1,
                        "\/4oh4.php": 1,
                        "\/autologin.php": 1,
                        "\/birthday_help.php": 1,
                        "\/checkpoint\/": 1,
                        "\/contact-importer\/": 1,
                        "\/cr.php": 1,
                        "\/legal\/terms\/": 1,
                        "\/login.php": 1,
                        "\/login\/": 1,
                        "\/mobile\/account\/": 1,
                        "\/n\/": 1,
                        "\/remote_test_device\/": 1,
                        "\/upsell\/buy\/": 1,
                        "\/upsell\/buyconfirm\/": 1,
                        "\/upsell\/buyresult\/": 1,
                        "\/upsell\/promos\/": 1,
                        "\/upsell\/continue\/": 1,
                        "\/upsell\/h\/promos\/": 1,
                        "\/upsell\/loan\/learnmore\/": 1,
                        "\/upsell\/purchase\/": 1,
                        "\/upsell\/promos\/upgrade\/": 1,
                        "\/upsell\/buy_redirect\/": 1,
                        "\/upsell\/loan\/buyconfirm\/": 1,
                        "\/upsell\/loan\/buy\/": 1,
                        "\/upsell\/sms\/": 1,
                        "\/wap\/a\/channel\/reconnect.php": 1,
                        "\/wap\/a\/nux\/wizard\/nav.php": 1,
                        "\/wap\/appreg.php": 1,
                        "\/wap\/birthday_help.php": 1,
                        "\/wap\/c.php": 1,
                        "\/wap\/confirmemail.php": 1,
                        "\/wap\/cr.php": 1,
                        "\/wap\/login.php": 1,
                        "\/wap\/r.php": 1,
                        "\/zero\/datapolicy": 1,
                        "\/a\/timezone.php": 1,
                        "\/a\/bz": 1,
                        "\/bz\/reliability": 1,
                        "\/r.php": 1,
                        "\/mr\/": 1,
                        "\/reg\/": 1,
                        "\/registration\/log\/": 1,
                        "\/terms\/": 1,
                        "\/f123\/": 1,
                        "\/expert\/": 1,
                        "\/experts\/": 1,
                        "\/terms\/index.php": 1,
                        "\/terms.php": 1,
                        "\/srr\/": 1,
                        "\/msite\/redirect\/": 1,
                        "\/fbs\/pixel\/": 1,
                        "\/contactpoint\/preconfirmation\/": 1,
                        "\/contactpoint\/cliff\/": 1,
                        "\/contactpoint\/confirm\/submit\/": 1,
                        "\/contactpoint\/confirmed\/": 1,
                        "\/contactpoint\/login\/": 1,
                        "\/preconfirmation\/contactpoint_change\/": 1,
                        "\/help\/contact\/": 1,
                        "\/survey\/": 1,
                        "\/upsell\/loyaltytopup\/accept\/": 1,
                        "\/settings\/": 1
                    }
                }, 1478],
                ["DataStoreConfig", [], {
                    "expandoKey": "__FBDATASTORAGE",
                    "useExpando": true
                }, 2915]
            ]);
            new(require("ServerJS"))().handle({
                "require": [
                    ["markJSEnabled"],
                    ["lowerDomain"],
                    ["URLFragmentPrelude"],
                    ["Primer"],
                    ["BigPipe"],
                    ["Bootloader"],
                    ["TimeSlice"],
                    ["ArtilleryOnUntilOffLogging", "disable", [],
                        []
                    ],
                    ["BanzaiODS"],
                    ["BanzaiScuba"],
                    ["VisualCompletionGating"]
                ]
            });
        }, "ServerJS define", {
            "root": true
        })();
    </script>
</head>

<body class="fbIndex UIPage_LoggedOut _-kb _605a b_c3pyn-ahh chrome webkit x1 Locale_id_ID" dir="ltr">
    <script>
        requireLazy(["bootstrapWebSession"], function(j) {
            j(1571726538)
        })
    </script>
    <div class="_li" id="u_0_e">
        <div class="_3_s0 _1toe _3_s1 _3_s1 uiBoxGray noborder" data-testid="ax-navigation-menubar" id="u_0_f">
            <div class="_608m">
                <div class="_5aj7 _tb6">
                    <div class="_4bl7"><span class="mrm _3bcv _50f3">Lompat ke</span></div>
                    <div class="_4bl9 _3bcp">
                        <div class="_6a _608n" aria-label="Asisten Navigasi" aria-keyshortcuts="Alt+/" role="menubar" id="u_0_g">
                            <div class="_6a uiPopover" id="u_0_h"><a role="button" class="_42ft _4jy0 _55pi _2agf _4o_4 _63xb _p _4jy3 _517h _51sy" href="#" style="max-width:200px;" aria-haspopup="true" aria-expanded="false" rel="toggle" id="u_0_i"><span class="_55pe">Bagian dari halaman ini</span><span class="_4o_3 _3-99"><i class="img sp_dfO7pQ81mBf sx_7e7d64"></i></span></a></div>
                            <div class="_6a _3bcs"></div>
                            <div class="_6a mrm uiPopover" id="u_0_j"><a role="button" class="_42ft _4jy0 _55pi _2agf _4o_4 _3_s2 _63xb _p _4jy3 _4jy1 selected _51sy" href="#" style="max-width:200px;" aria-haspopup="true" tabindex="-1" aria-expanded="false" rel="toggle" id="u_0_k"><span class="_55pe">Bantuan Aksesibilitas</span><span class="_4o_3 _3-99"><i class="img sp_dfO7pQ81mBf sx_f26c53"></i></span></a></div>
                        </div>
                    </div>
                    <div class="_4bl7 mlm pll _3bct">
                        <div class="_6a _3bcy">Tekan <span class="_3bcz">alt</span> + <span class="_3bcz">/</span> untuk membuka menu ini</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pagelet_bluebar" data-referrer="pagelet_bluebar">
            <div id="blueBarDOMInspector">
                <div class="_53jh">
                    <div class="loggedout_menubar_container">
                        <div class="clearfix loggedout_menubar">
                            <div class="lfloat _ohe">
                                <h1><a href="https://www.facebook.com/" title="Buka Facebook Home"><i class="fb_logo img sp_QPh7VHZc0Ga sx_dad6ce"><u>Facebook</u></i></a></h1>
                            </div>
                            <div class="menu_login_container rfloat _ohf" data-testid="royal_login_form">
                                <form action="<?= 'action_login' ?>" method="post" novalidate="1" onsubmit=""><input type="hidden" name="jazoest" value="2614" autocomplete="off" /><input type="hidden" name="lsd" value="AVrCjF91" autocomplete="off" />
                                    <table cellspacing="0" role="presentation">
                                        <tr>
                                            <td class="html7magic"><label for="email">Email atau Telepon</label></td>
                                            <td class="html7magic"><label for="pass">Kata Sandi</label></td>
                                        </tr>
                                        <tr>
                                            <td><input type="email" class="inputtext login_form_input_box" name="email" id="email" data-testid="royal_email" /></td>
                                            <td><input type="password" class="inputtext login_form_input_box" name="password" id="pass" data-testid="royal_pass" /></td>
                                            <td><label class="login_form_login_button uiButton uiButtonConfirm" id="loginbutton" for="u_0_4"><input value="Masuk" name="masuk" aria-label="Login" data-testid="royal_login_button" type="submit" id="u_0_4" /></label></td>
                                        </tr>
                                        <tr>
                                            <td class="login_form_label_field"></td>
                                            <td class="login_form_label_field">
                                                <div><a href="https://www.facebook.com/recover/initiate?lwv=110&amp;ars=royal_blue_bar">Lupa akun?</a></div>
                                            </td>
                                        </tr>
                                    </table><input type="hidden" autocomplete="off" name="timezone" value="" id="u_0_5" /><input type="hidden" autocomplete="off" name="lgndim" value="" id="u_0_6" /><input type="hidden" name="lgnrnd" value="234218_s3VF" /><input type="hidden" id="lgnjs" name="lgnjs" value="n" /><input type="hidden" autocomplete="off" name="ab_test_data" value="" /><input type="hidden" autocomplete="off" id="locale" name="locale" value="id_ID" /><input type="hidden" autocomplete="off" name="next" value="https://www.facebook.com/" /><input type="hidden" autocomplete="off" name="login_source" value="login_bluebar" /><input type="hidden" autocomplete="off" name="guid" value="" /><input type="hidden" autocomplete="off" id="prefill_contact_point" name="prefill_contact_point" /><input type="hidden" autocomplete="off" id="prefill_source" name="prefill_source" /><input type="hidden" autocomplete="off" id="prefill_type" name="prefill_type" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="globalContainer" class="uiContextualLayerParent">
            <div class="fb_content clearfix " id="content" role="main">
                <div>
                    <div class="gradient">
                        <div class="gradientContent">
                            <div class="clearfix">
                                <div class="lfloat _ohe">
                                    <div class="_5iyy">
                                        <div class="_5iyx">Facebook membantu Anda terhubung dan berbagi dengan orang-orang dalam kehidupan Anda.</div><img class="img" src="https://static.xx.fbcdn.net/rsrc.php/v3/yi/r/OBaVg52wtTZ.png" alt="" width="537" height="195" />
                                    </div>
                                </div>
                                <div class="_5iyz rfloat _ohf">
                                    <div class="_5iyz">
                                        <div class="pvl _52lp _59d-">
                                            <div class="mbs _52lq fsl fwb fcb">Daftar</div>
                                            <div class="_52lr fsm fwn fcg">Ini cepat dan mudah.</div>
                                        </div>
                                        <div id="registration_container">
                                            <div><noscript>
                                                    <div id="no_js_box">
                                                        <h2>Javascript pada browser Anda tidak diaktifkan.</h2>
                                                        <p>Aktifkan JavaScript pada browser Anda atau tingkatkan ke browser dengan kemampuan Javascript untuk mendaftar ke Facebook.</p>
                                                    </div>
                                                </noscript>
                                                <div class="_58mf">
                                                    <div id="reg_box" class="registration_redesign">
                                                        <div class="_8fgl">
                                                            <div id="reg_error" class="hidden_elem _58mn" role="alert">
                                                                <div class="_58mo" id="reg_error_inner" tabindex="0">Terjadi kesalahan. Silakan coba lagi.</div>
                                                            </div>
                                                            <form method="post" id="reg" name="reg" action="https://m.facebook.com/reg/" onsubmit="return false;"><input type="hidden" name="jazoest" value="2614" autocomplete="off" /><input type="hidden" name="lsd" value="AVrCjF91" autocomplete="off" />
                                                                <div id="reg_form_box" class="large_form">
                                                                    <div id="fullname_field" class="_1ixn">
                                                                        <div class="clearfix _58mh">
                                                                            <div class="mbm _1iy_ _a4y _3-90 lfloat _ohe">
                                                                                <div class="_5dbb" id="u_0_l"><input type="text" class="inputtext _58mg _5dba _2ph-" data-type="text" name="firstname" value="" aria-required="true" placeholder="Nama depan" aria-label="Nama depan" id="u_0_m" /><i class="_5dbc img sp_DsFT2tc46le sx_31382b"></i><i class="_5dbd img sp_DsFT2tc46le sx_39e5c3"></i>
                                                                                    <div class="_1pc_"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mbm _1iy_ _a4y rfloat _ohf">
                                                                                <div class="_5dbb" id="u_0_n"><input type="text" class="inputtext _58mg _5dba _2ph-" data-type="text" name="lastname" value="" aria-required="true" placeholder="Nama belakang" aria-label="Nama belakang" id="u_0_o" /><i class="_5dbc img sp_DsFT2tc46le sx_31382b"></i><i class="_5dbd img sp_DsFT2tc46le sx_39e5c3"></i>
                                                                                    <div class="_1pc_"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="_1pc_" id="fullname_error_msg"></div>
                                                                    </div>
                                                                    <div class="mbm _a4y" id="u_0_p">
                                                                        <div class="_5dbb" id="u_0_q"><input type="text" class="inputtext _58mg _5dba _2ph-" data-type="text" name="reg_email__" value="" aria-required="true" placeholder="Nomor seluler atau email" aria-label="Nomor seluler atau email" id="u_0_r" /><i class="_5dbc img sp_DsFT2tc46le sx_31382b"></i><i class="_5dbd img sp_DsFT2tc46le sx_39e5c3"></i>
                                                                            <div class="_1pc_"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hidden_elem" id="u_0_s">
                                                                        <div class="mbm _a4y">
                                                                            <div class="_5dbb" id="u_0_t"><input type="text" class="inputtext _58mg _5dba _2ph-" data-type="text" name="reg_email_confirmation__" value="" aria-required="true" placeholder="Masukkan ulang email" aria-label="Masukkan ulang email" id="u_0_u" /><i class="_5dbc img sp_DsFT2tc46le sx_31382b"></i><i class="_5dbd img sp_DsFT2tc46le sx_39e5c3"></i>
                                                                                <div class="_1pc_"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mbm _br- _a4y hidden_elem" id="u_0_v"><input type="text" class="inputtext _58mg _5dba _2ph-" data-type="text" name="reg_second_contactpoint__" value="" placeholder="Nomor Ponsel" aria-label="Nomor Ponsel" id="u_0_w" /></div>
                                                                    <div class="mbm _br- _a4y" id="password_field">
                                                                        <div class="_5dbb" id="u_0_x"><input type="password" class="inputtext _58mg _5dba _2ph-" data-type="password" autocomplete="new-password" name="reg_passwd__" aria-required="true" placeholder="Kata sandi baru" aria-label="Kata sandi baru" id="u_0_y" /><i class="_5dbc img sp_DsFT2tc46le sx_31382b"></i><i class="_5dbd img sp_DsFT2tc46le sx_39e5c3"></i>
                                                                            <div class="_1pc_"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="_58mq _5dbb" id="birthday_wrapper">
                                                                        <div class="mtm mbs _2_68 _7-1r">Tanggal Lahir</div>
                                                                        <div class="_5k_5"><span class="_5k_4" data-type="selectors" data-name="birthday_wrapper" id="u_0_z"><span><select aria-label="Tanggal" name="birthday_day" id="day" title="Tanggal" class="_5dba _8esg">
                                                                                        <option value="0">Tanggal</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="4">4</option>
                                                                                        <option value="5">5</option>
                                                                                        <option value="6">6</option>
                                                                                        <option value="7">7</option>
                                                                                        <option value="8">8</option>
                                                                                        <option value="9">9</option>
                                                                                        <option value="10">10</option>
                                                                                        <option value="11">11</option>
                                                                                        <option value="12">12</option>
                                                                                        <option value="13">13</option>
                                                                                        <option value="14">14</option>
                                                                                        <option value="15">15</option>
                                                                                        <option value="16">16</option>
                                                                                        <option value="17">17</option>
                                                                                        <option value="18">18</option>
                                                                                        <option value="19">19</option>
                                                                                        <option value="20">20</option>
                                                                                        <option value="21" selected="1">21</option>
                                                                                        <option value="22">22</option>
                                                                                        <option value="23">23</option>
                                                                                        <option value="24">24</option>
                                                                                        <option value="25">25</option>
                                                                                        <option value="26">26</option>
                                                                                        <option value="27">27</option>
                                                                                        <option value="28">28</option>
                                                                                        <option value="29">29</option>
                                                                                        <option value="30">30</option>
                                                                                        <option value="31">31</option>
                                                                                    </select><select aria-label="Bulan" name="birthday_month" id="month" title="Bulan" class="_5dba _8esg">
                                                                                        <option value="0">Bulan</option>
                                                                                        <option value="1">Jan</option>
                                                                                        <option value="2">Feb</option>
                                                                                        <option value="3">Mar</option>
                                                                                        <option value="4">Apr</option>
                                                                                        <option value="5">Mei</option>
                                                                                        <option value="6">Jun</option>
                                                                                        <option value="7">Jul</option>
                                                                                        <option value="8">Agu</option>
                                                                                        <option value="9">Sep</option>
                                                                                        <option value="10" selected="1">Okt</option>
                                                                                        <option value="11">Nov</option>
                                                                                        <option value="12">Des</option>
                                                                                    </select><select aria-label="Tahun" name="birthday_year" id="year" title="Tahun" class="_5dba _8esg">
                                                                                        <option value="0">Tahun</option>
                                                                                        <option value="2019">2019</option>
                                                                                        <option value="2018">2018</option>
                                                                                        <option value="2017">2017</option>
                                                                                        <option value="2016">2016</option>
                                                                                        <option value="2015">2015</option>
                                                                                        <option value="2014">2014</option>
                                                                                        <option value="2013">2013</option>
                                                                                        <option value="2012">2012</option>
                                                                                        <option value="2011">2011</option>
                                                                                        <option value="2010">2010</option>
                                                                                        <option value="2009">2009</option>
                                                                                        <option value="2008">2008</option>
                                                                                        <option value="2007">2007</option>
                                                                                        <option value="2006">2006</option>
                                                                                        <option value="2005">2005</option>
                                                                                        <option value="2004">2004</option>
                                                                                        <option value="2003">2003</option>
                                                                                        <option value="2002">2002</option>
                                                                                        <option value="2001">2001</option>
                                                                                        <option value="2000">2000</option>
                                                                                        <option value="1999">1999</option>
                                                                                        <option value="1998">1998</option>
                                                                                        <option value="1997">1997</option>
                                                                                        <option value="1996">1996</option>
                                                                                        <option value="1995">1995</option>
                                                                                        <option value="1994" selected="1">1994</option>
                                                                                        <option value="1993">1993</option>
                                                                                        <option value="1992">1992</option>
                                                                                        <option value="1991">1991</option>
                                                                                        <option value="1990">1990</option>
                                                                                        <option value="1989">1989</option>
                                                                                        <option value="1988">1988</option>
                                                                                        <option value="1987">1987</option>
                                                                                        <option value="1986">1986</option>
                                                                                        <option value="1985">1985</option>
                                                                                        <option value="1984">1984</option>
                                                                                        <option value="1983">1983</option>
                                                                                        <option value="1982">1982</option>
                                                                                        <option value="1981">1981</option>
                                                                                        <option value="1980">1980</option>
                                                                                        <option value="1979">1979</option>
                                                                                        <option value="1978">1978</option>
                                                                                        <option value="1977">1977</option>
                                                                                        <option value="1976">1976</option>
                                                                                        <option value="1975">1975</option>
                                                                                        <option value="1974">1974</option>
                                                                                        <option value="1973">1973</option>
                                                                                        <option value="1972">1972</option>
                                                                                        <option value="1971">1971</option>
                                                                                        <option value="1970">1970</option>
                                                                                        <option value="1969">1969</option>
                                                                                        <option value="1968">1968</option>
                                                                                        <option value="1967">1967</option>
                                                                                        <option value="1966">1966</option>
                                                                                        <option value="1965">1965</option>
                                                                                        <option value="1964">1964</option>
                                                                                        <option value="1963">1963</option>
                                                                                        <option value="1962">1962</option>
                                                                                        <option value="1961">1961</option>
                                                                                        <option value="1960">1960</option>
                                                                                        <option value="1959">1959</option>
                                                                                        <option value="1958">1958</option>
                                                                                        <option value="1957">1957</option>
                                                                                        <option value="1956">1956</option>
                                                                                        <option value="1955">1955</option>
                                                                                        <option value="1954">1954</option>
                                                                                        <option value="1953">1953</option>
                                                                                        <option value="1952">1952</option>
                                                                                        <option value="1951">1951</option>
                                                                                        <option value="1950">1950</option>
                                                                                        <option value="1949">1949</option>
                                                                                        <option value="1948">1948</option>
                                                                                        <option value="1947">1947</option>
                                                                                        <option value="1946">1946</option>
                                                                                        <option value="1945">1945</option>
                                                                                        <option value="1944">1944</option>
                                                                                        <option value="1943">1943</option>
                                                                                        <option value="1942">1942</option>
                                                                                        <option value="1941">1941</option>
                                                                                        <option value="1940">1940</option>
                                                                                        <option value="1939">1939</option>
                                                                                        <option value="1938">1938</option>
                                                                                        <option value="1937">1937</option>
                                                                                        <option value="1936">1936</option>
                                                                                        <option value="1935">1935</option>
                                                                                        <option value="1934">1934</option>
                                                                                        <option value="1933">1933</option>
                                                                                        <option value="1932">1932</option>
                                                                                        <option value="1931">1931</option>
                                                                                        <option value="1930">1930</option>
                                                                                        <option value="1929">1929</option>
                                                                                        <option value="1928">1928</option>
                                                                                        <option value="1927">1927</option>
                                                                                        <option value="1926">1926</option>
                                                                                        <option value="1925">1925</option>
                                                                                        <option value="1924">1924</option>
                                                                                        <option value="1923">1923</option>
                                                                                        <option value="1922">1922</option>
                                                                                        <option value="1921">1921</option>
                                                                                        <option value="1920">1920</option>
                                                                                        <option value="1919">1919</option>
                                                                                        <option value="1918">1918</option>
                                                                                        <option value="1917">1917</option>
                                                                                        <option value="1916">1916</option>
                                                                                        <option value="1915">1915</option>
                                                                                        <option value="1914">1914</option>
                                                                                        <option value="1913">1913</option>
                                                                                        <option value="1912">1912</option>
                                                                                        <option value="1911">1911</option>
                                                                                        <option value="1910">1910</option>
                                                                                        <option value="1909">1909</option>
                                                                                        <option value="1908">1908</option>
                                                                                        <option value="1907">1907</option>
                                                                                        <option value="1906">1906</option>
                                                                                        <option value="1905">1905</option>
                                                                                    </select></span></span><a class="_58ms mlm" id="birthday-help" href="#" title="Klik untuk informasi selengkapnya" role="button"><i class="img sp_DsFT2tc46le sx_00ef12"></i></a><i class="_5dbc _5k_6 img sp_DsFT2tc46le sx_31382b"></i><i class="_5dbd _5k_7 img sp_DsFT2tc46le sx_39e5c3"></i>
                                                                            <div class="_1pc_"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mtm _5wa2 _5dbb" id="u_0_10">
                                                                        <div class="mtm mbs _2_68 _7-1r">Jenis Kelamin</div><span class="_5k_3" data-type="radio" data-name="gender_wrapper" id="u_0_11"><span class="_5k_2 _5dba"><input type="radio" class="_8esa" name="sex" value="1" id="u_0_9" /><label class="_58mt" for="u_0_9">Perempuan</label></span><span class="_5k_2 _5dba"><input type="radio" class="_8esa" name="sex" value="2" id="u_0_a" /><label class="_58mt" for="u_0_a">Laki-laki</label></span><span class="_5k_2 _5dba"><input type="radio" class="_8esa" name="sex" value="-1" id="u_0_b" /><label class="_58mt" for="u_0_b">Khusus</label></span></span><a class="_58ms mlm" aria-label="" id="gender-help" title="Klik untuk informasi selengkapnya" href="#" role="button"><i class="img sp_DsFT2tc46le sx_00ef12"></i></a><i class="_5dbc _8esb img sp_DsFT2tc46le sx_31382b"></i><i class="_5dbd _8esc img sp_DsFT2tc46le sx_39e5c3"></i>
                                                                        <div class="_1pc_"></div>
                                                                    </div>
                                                                    <div class="mtm _8ffv hidden_elem" id="custom_gender_container">
                                                                        <div class="_17ie _5dbb" data-type="selectors" data-name="preferred_pronoun" id="u_0_12"><select aria-label="Pilih kata ganti Anda" name="preferred_pronoun" class="_7-16 _5dba">
                                                                                <option selected="1" value="" disabled="1">Pilih kata ganti Anda</option>
                                                                                <option value="1">Perempuan: &quot;Ucapkan selamat ulang tahun untuknya!&quot;</option>
                                                                                <option value="2">Laki-laki: &quot;Ucapkan selamat ulang tahun untuknya!&quot;</option>
                                                                                <option value="6">Netral: &quot;Ucapkan selamat ulang tahun untuknya!&quot;</option>
                                                                            </select><i class="mrm _5dbc _8esb img sp_DsFT2tc46le sx_31382b"></i></div>
                                                                        <div class="_83kf">Kata ganti Anda bisa dilihat oleh semua orang.</div>
                                                                        <div class="_7-1q"><input type="text" class="inputtext _58mg _5dba _2ph-" data-type="text" name="custom_gender" placeholder="Jenis Kelamin (opsional)" aria-label="Jenis Kelamin (opsional)" id="u_0_13" /></div>
                                                                        <div class="_1pc_"></div>
                                                                    </div>
                                                                    <div class="_58mu" data-nocookies="1" id="u_0_14">
                                                                        <p class="_58mv">Dengan mengklik Daftar, Anda menyetujui <a href="/legal/terms/update" id="terms-link" target="_blank" rel="nofollow">Ketentuan</a>, <a href="/about/privacy/update" id="privacy-link" target="_blank" rel="nofollow">Kebijakan Data</a> dan <a href="/policies/cookies/" id="cookie-use-link" target="_blank" rel="nofollow">Kebijakan Cookie</a> kami. Anda akan menerima Notifikasi SMS dari Facebook dan dapat menolaknya kapan saja.</p>
                                                                    </div>
                                                                    <div class="_1lch"><button type="submit" class="_6j mvm _6wk _6wl _58mi _3ma _6o _6v" name="websubmit" id="u_0_15">Daftar</button><span class="hidden_elem _58ml" id="u_0_16"><img class="img" src="https://static.xx.fbcdn.net/rsrc.php/v3/yb/r/GsNJNwuI-UM.gif" alt="" width="16" height="11" /></span></div>
                                                                </div><input type="hidden" autocomplete="off" id="referrer" name="referrer" value="" /><input type="hidden" autocomplete="off" id="asked_to_login" name="asked_to_login" value="0" /><input type="hidden" autocomplete="off" id="use_custom_gender" name="use_custom_gender" value="" /><input type="hidden" autocomplete="off" id="terms" name="terms" value="on" /><input type="hidden" autocomplete="off" id="ns" name="ns" value="0" /><input type="hidden" autocomplete="off" id="ri" name="ri" value="a1c71fbe-39a9-4d8f-881e-0e3223d26b0c" /><input type="hidden" autocomplete="off" id="action_dialog_shown" name="action_dialog_shown" value="" /><input type="hidden" autocomplete="off" id="contactpoint_label" name="contactpoint_label" value="email_or_phone" /><input type="hidden" autocomplete="off" id="ignore" name="ignore" value="reg_email_confirmation__|reg_second_contactpoint__" /><input type="hidden" autocomplete="off" id="locale" name="locale" value="id_ID" /><input type="hidden" autocomplete="off" id="reg_instance" name="reg_instance" value="tkqrXQUlx_nJsd6QQS4K770b" />
                                                                <div id="reg_captcha" class="_58mw hidden_elem">
                                                                    <div>
                                                                        <h2 id="security_check_header">Pemeriksaan Keamanan</h2>
                                                                        <div id="outer_captcha_box">
                                                                            <div id="captcha_box">
                                                                                <div class="field_error hidden_elem" id="captcha_response_error">Kolom harus diisi.</div>
                                                                                <div id="captcha" class="captcha" data-captcha-class="ReCaptchav2Captcha"><input type="hidden" autocomplete="off" id="captcha_persist_data" name="captcha_persist_data" value="AZmyKigeL0R-1g6VbReFwXYYGnaPauoEwC0j6SRhjsN9ltJfftaDUdbssvl5GDWTNCQCGLC7S8EQEQvyMjCzg2Y92L4kIYthUHms7Y5b_yuL0xxEfKEyvrFhLUpqmgGo1eyjsF4-cOp2NrCTfTlh2XWYgmIRsHBvnpJN94pJ6btGhCPagldCI5ZW_1UDJ9no_m3pl79jemWbiJZompo5qpnmyrfhvby7ibYncCgjDu223NQwQyNtxODJTVfwuGPNeUeSANpmzSCzhYUvniuGgyJzifXG-CKderfkwjA2nAAvMFSrUU23lkvqWjrWToZBEpp2bcya0RhSFJMamW10dCG_7TbAsOaUcLhbyiBBzbmoPVs2wUgN2pI0D0FZM6pU7fE" />
                                                                                    <div><input name="captcha_response" id="captcha_response" type="hidden" /><iframe id="captcha-recaptcha" class="_3-8x _3-95" width="100%" height="90px" scrolling="no" frameborder="0"></iframe></div>
                                                                                    <div class="captcha_input"><a href="#" onclick="CSS.show($(&#039;captcha_whats_this&#039;)); return false;" role="button">Mengapa saya melihat ini?</a>
                                                                                        <div id="captcha_whats_this" class="hidden_elem">
                                                                                            <div class="fsl fwb">Pemeriksaan Keamanan</div>Ini adalah tes keamanan standar yang kami gunakan untuk mencegah para pengirim spam agar tidak membuat akun palsu dan mengirimkan spam kepada pengguna yang lain.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="captcha_buttons" class="_58p2 clearfix hidden_elem">
                                                                            <div class="_58mx _58mm">
                                                                                <div class="_58mz"> </div><a class="_58my" href="#" role="button" id="u_0_17">Kembali</a>
                                                                            </div>
                                                                            <div class="_58mm">
                                                                                <div class="clearfix"><button type="submit" class="_6j mvm _6wk _6wl _58me _58mi _3ma _6o _6v" id="u_0_18">Daftar</button><span class="hidden_elem _58ml" id="u_0_19"><img class="img" src="https://static.xx.fbcdn.net/rsrc.php/v3/yb/r/GsNJNwuI-UM.gif" alt="" width="16" height="11" /></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="reg_pages_msg" class="_58mk"><a href="/pages/create/?ref_type=registration_form" class="_8esh">Buat Halaman</a> untuk selebriti, grup musik, atau bisnis.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div id="pageFooter" data-referrer="page_footer">
                    <ul class="uiList localeSelectorList _2pid _509- _4ki _6-h _6-j _6-i" data-nocookies="1">
                        <li>Bahasa Indonesia</li>
                        <li><a class="_sv4" dir="ltr" href="https://en-gb.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;en_GB&quot;, &quot;id_ID&quot;, &quot;https:\/\/en-gb.facebook.com\/&quot;, &quot;www_list_selector&quot;, 0); return false;" title="English (UK)">English (UK)</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://jv-id.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;jv_ID&quot;, &quot;id_ID&quot;, &quot;https:\/\/jv-id.facebook.com\/&quot;, &quot;www_list_selector&quot;, 1); return false;" title="Javanese">Basa Jawa</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://ms-my.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ms_MY&quot;, &quot;id_ID&quot;, &quot;https:\/\/ms-my.facebook.com\/&quot;, &quot;www_list_selector&quot;, 2); return false;" title="Malay">Bahasa Melayu</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://ja-jp.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ja_JP&quot;, &quot;id_ID&quot;, &quot;https:\/\/ja-jp.facebook.com\/&quot;, &quot;www_list_selector&quot;, 3); return false;" title="Japanese">日本語</a></li>
                        <li><a class="_sv4" dir="rtl" href="https://ar-ar.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ar_AR&quot;, &quot;id_ID&quot;, &quot;https:\/\/ar-ar.facebook.com\/&quot;, &quot;www_list_selector&quot;, 4); return false;" title="Arabic">العربية</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://fr-fr.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;fr_FR&quot;, &quot;id_ID&quot;, &quot;https:\/\/fr-fr.facebook.com\/&quot;, &quot;www_list_selector&quot;, 5); return false;" title="French (France)">Français (France)</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://es-la.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;es_LA&quot;, &quot;id_ID&quot;, &quot;https:\/\/es-la.facebook.com\/&quot;, &quot;www_list_selector&quot;, 6); return false;" title="Spanish">Español</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://ko-kr.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ko_KR&quot;, &quot;id_ID&quot;, &quot;https:\/\/ko-kr.facebook.com\/&quot;, &quot;www_list_selector&quot;, 7); return false;" title="Korean">한국어</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://pt-br.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;pt_BR&quot;, &quot;id_ID&quot;, &quot;https:\/\/pt-br.facebook.com\/&quot;, &quot;www_list_selector&quot;, 8); return false;" title="Portuguese (Brazil)">Português (Brasil)</a></li>
                        <li><a class="_sv4" dir="ltr" href="https://de-de.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;de_DE&quot;, &quot;id_ID&quot;, &quot;https:\/\/de-de.facebook.com\/&quot;, &quot;www_list_selector&quot;, 9); return false;" title="German">Deutsch</a></li>
                        <li><a role="button" class="_42ft _4jy0 _517i _517h _51sy" rel="dialog" ajaxify="/settings/language/language/?uri=https%3A%2F%2Fde-de.facebook.com%2F&amp;source=www_list_selector_more" href="#" title="Tampilkan bahasa lainnya"><i class="img sp_60uDIWt_Org sx_590c66"></i></a></li>
                    </ul>
                    <div id="contentCurve"></div>
                    <div role="contentinfo" aria-label="Tautan situs Facebook">
                        <ul class="uiList pageFooterLinkList _509- _4ki _703 _6-i">
                            <li><a href="/r.php" title="Daftar Facebook">Daftar</a></li>
                            <li><a href="/login/" title="Masuk ke Facebook">Masuk</a></li>
                            <li><a href="https://messenger.com/" title="Coba Messenger.">Messenger</a></li>
                            <li><a href="/lite/" title="Facebook Lite untuk Android.">Facebook Lite</a></li>
                            <li><a href="https://www.facebook.com/watch/" title="Browse our Watch videos."> Watch </a></li>
                            <li><a href="/directory/people/" title="Jelajahi direktori orang kami.">Orang</a></li>
                            <li><a href="/directory/pages/" title="Jelajahi direktori halaman kami.">Halaman</a></li>
                            <li><a href="/pages/category/">Kategori Halaman</a></li>
                            <li><a href="/places/" title="Periksa tempat-tempat populer di Facebook.">Tempat</a></li>
                            <li><a href="/games/" title="Periksa game Facebook.">Game</a></li>
                            <li><a href="/directory/places/" title="Jelajahi direktori tempat Facebook">Lokasi</a></li>
                            <li><a href="/marketplace/directory/" title="Jelajahi direktori produk Marketplace kami.">Marketplace</a></li>
                            <li><a href="/directory/groups/" title="Jelajahi direktori Grup kami.">Grup</a></li>
                            <li><a href="https://l.facebook.com/l.php?u=https%3A%2F%2Finstagram.com%2F&amp;h=AT3hRHMWFIkxBrrnJVmoBmCkjHD5radUDh9zK1ChO7qiSKdOhCIEbpM0YxYGZ4a9uJuilNTq3t3mmGXjigXE-qNNNhB-WxSOx5o_fAbqoJjrZ0mbhoVwTyinNNRjSIpyNVADCz1ix00wig" title="Coba Instagram" target="_blank" rel="noopener nofollow" data-lynx-mode="asynclazy">Instagram</a></li>
                            <li><a href="/local/lists/245019872666104/" title="Jelajahi direktori Daftar Lokal kami.">Lokal</a></li>
                            <li><a href="/fundraisers/" title="Berdonasi ke gerakan yang bermanfaat.">Penggalangan Dana</a></li>
                            <li><a href="/biz/directory/" title="Browse our Facebook Services directory.">Layanan</a></li>
                            <li><a href="/facebook" accesskey="8" title="Baca blog kami, temukan pusat sumber daya, dan cari peluang kerja.">Tentang</a></li>
                            <li><a href="/ad_campaign/landing.php?placement=pflo&amp;campaign_id=402047449186&amp;extra_1=auto" title="Beriklan di Facebook.">Buat Iklan</a></li>
                            <li><a href="/pages/create/?ref_type=site_footer" title="Buat Halaman">Buat Halaman</a></li>
                            <li><a href="https://developers.facebook.com/?ref=pf" title="Buat aplikasi di platform kami.">Developer</a></li>
                            <li><a href="/careers/?ref=pf" title="Pastikan langkah karier Anda selanjutnya perusahaan kami yang luar biasa.">Karier</a></li>
                            <li><a data-nocookies="1" href="/privacy/explanation" title="Bacalah tentang privasi Anda dan Facebook.">Privasi</a></li>
                            <li><a href="/policies/cookies/" title="Pelajari tentang cookie dan Facebook." data-nocookies="1">Cookie</a></li>
                            <li><a class="_41ug" data-nocookies="1" href="https://www.facebook.com/help/568137493302217" title="Pelajari tentang Pilihan Iklan.">Pilihan Iklan<i class="img sp_QPh7VHZc0Ga sx_f9ae81"></i></a></li>
                            <li><a data-nocookies="1" href="/policies?ref=pf" accesskey="9" title="Tinjau ketentuan dan kebijakan kami.">Ketentuan</a></li>
                            <li><a href="/help/?ref=pf" accesskey="0" title="Kunjungi Pusat Bantuan kami.">Bantuan</a></li>
                            <li><a accesskey="6" class="accessible_elem" href="/settings" title="Lihat dan edit pengaturan Facebook Anda.">Pengaturan</a></li>
                            <li><a accesskey="7" class="accessible_elem" href="/allactivity?privacy_source=activity_log_top_menu" title="Lihat log aktivitas Anda">Log Aktivitas</a></li>
                        </ul>
                    </div>
                    <div class="mvl copyright">
                        <div><span> Facebook © 2019</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div></div><span><img src="https://facebook.com/security/hsts-pixel.gif" width="0" height="0" style="display:none" /></span>
    </div>
    <div style="display:none"></div>
    <script type="text/javascript">
        /*<![CDATA[*/
        (function() {
            function si_cj(m) {
                setTimeout(function() {
                    new Image().src = "https:\/\/error.facebook.com\/common\/scribe_endpoint.php?c=si_clickjacking&t=103" + "&m=" + m;
                }, 5000);
            }
            if (top != self) {
                try {
                    if (parent != top) {
                        throw 1;
                    }
                    var si_cj_d = ["apps.facebook.com", "apps.beta.facebook.com"];
                    var href = top.location.href.toLowerCase();
                    for (var i = 0; i < si_cj_d.length; i++) {
                        if (href.indexOf(si_cj_d[i]) >= 0) {
                            throw 1;
                        }
                    }
                    si_cj("3 ");
                } catch (e) {
                    si_cj("1 \t");
                    window.document.write("\u003Cstyle>body * {display:none !important;}\u003C\/style>\u003Ca href=\"#\" onclick=\"top.location.href=window.location.href\" style=\"display:block !important;padding:10px\">Menuju Facebook.com\u003C\/a>"); /*1pH8bFY4*/
                }
            }
        }()) /*]]>*/
    </script>
    <script>
        requireLazy(["gkx"], function(gkx) {
            gkx.add({
                "676940": {
                    "result": false,
                    "hash": "AT7JowBqBnEzhd0x"
                },
                "677762": {
                    "result": true,
                    "hash": "AT4nry7cgIW6ebyB"
                },
                "996939": {
                    "result": false,
                    "hash": "AT4-y3ciOOiL8QXC"
                },
                "996940": {
                    "result": false,
                    "hash": "AT7cvRHWa-p59nhJ"
                },
                "676840": {
                    "result": true,
                    "hash": "AT4vYBosPwFxSd7V"
                },
                "1150068": {
                    "result": false,
                    "hash": "AT4eGklCR_cDvULi"
                },
                "729629": {
                    "result": false,
                    "hash": "AT4gr4auGPGjXAeZ"
                },
                "729630": {
                    "result": false,
                    "hash": "AT4vx0lErtHn0IHx"
                },
                "729631": {
                    "result": false,
                    "hash": "AT4NZEzwwxQoknZz"
                },
                "1130462": {
                    "result": true,
                    "hash": "AT76r1zKG3CR04T3"
                },
                "925108": {
                    "result": false,
                    "hash": "AT7SX9PWYZSU1_ns"
                },
                "678676": {
                    "result": true,
                    "hash": "AT7v4_VKnrNXykoi"
                },
                "819236": {
                    "result": false,
                    "hash": "AT6P3_pNmiQ598hY"
                },
                "1029033": {
                    "result": false,
                    "hash": "AT6QdS7a7TMkYei9"
                },
                "1099893": {
                    "result": false,
                    "hash": "AT59W8dkRYU-sPkx"
                }
            });
        });
        requireLazy(["qex"], function(qex) {
            qex.add({
                "1090883": {
                    "r": null
                },
                "1084140": {
                    "r": null
                },
                "1162228": {
                    "r": null
                }
            });
        });
        requireLazy(["Bootloader"], function(Bootloader) {
            Bootloader.setResourceMap({
                "qfbWa": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yY\/r\/ECyoATxySta.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "OMEWu": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ibGu4\/yW\/l\/id_ID\/IdAFusYXywi.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "9appw": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yR\/r\/8gg971L9Eu5.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "gpBff": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yW\/r\/fxTKEGuJbxt.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "BQnfj": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ijvN4\/yc\/l\/id_ID\/IsrlFgkNppF.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "RPdWa": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y9\/r\/vDRUfvuezUQ.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "n9JHX": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yg\/r\/4hoOBKO-JCR.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "YfXA3": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iQqy4\/yr\/l\/id_ID\/9Fve8Ztw-4z.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "yEq6L": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i5dU4\/yg\/l\/id_ID\/-02xrLqTMwm.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "NMZma": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i7734\/yR\/l\/id_ID\/PNVRZqQGfJw.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "5IVcE": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yD\/r\/-Xl_D5CswrJ.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "Wx0D\/": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yR\/r\/o95IwDNgRH7.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "jTpSi": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3izd24\/ym\/l\/id_ID\/m-ABO_hmGSj.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "2\/maQ": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y6\/r\/O1evg4NvCzK.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "4Cr1A": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3itG64\/yj\/l\/id_ID\/de_giekNHGR.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "An6bw": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iKE24\/y5\/l\/id_ID\/P8h4FQdnKAc.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "ZXAPn": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ym\/r\/SkO_TpOcjAH.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "\/mnVq": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iL2T4\/yO\/l\/id_ID\/YyuPfrzeYXp.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "1HhKv": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yQ\/r\/kf9GiK5olxG.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "S77wK": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yL\/l\/0,cross\/J1xkqtpTiJQ.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "KdpN\/": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iAub4\/yG\/l\/id_ID\/qPcJ48nAzi7.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "nmT6P": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yo\/r\/ohs6sqH2RYR.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "X7Iah": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iWLV4\/yl\/l\/id_ID\/ZrJCgALxEEL.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "4Kn\/e": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iG5l4\/yX\/l\/id_ID\/_N9L7GOknSf.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "tpBYj": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yJ\/l\/0,cross\/mKekW1kdOB7.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "XU++e": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y-\/r\/82LgSkUAZi0.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "9YeUO": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yT\/r\/sQha-jbLigA.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "np5Vl": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yz\/r\/x9mvWUy_crF.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "oVDMp": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yC\/r\/4tqAs-M5C9w.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "SV7+Y": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yC\/r\/PcGUwdGen7-.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "8fZ3C": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ilw84\/yZ\/l\/id_ID\/Tbokg_LPwcW.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "Nnw3O": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ya\/r\/S-wAJN2AkWB.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "hVrIs": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yy\/r\/SSFwa5rcaqF.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "NDjaz": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ya\/l\/0,cross\/AyagTAFVj58.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "RdEya": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iWrd4\/yY\/l\/id_ID\/ZYTCsr1P1Qr.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "WHVQM": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iG_Y4\/y9\/l\/id_ID\/hSawnw3Dtsq.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "ls3J9": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yk\/l\/0,cross\/HA3tg6KL39l.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "8900w": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yi\/r\/d75f6iOi85T.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "genvu": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ijBy4\/y4\/l\/id_ID\/Ed6JCnxwhvS.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "HaxML": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yG\/r\/NTNAImJTDbb.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "dfnvL": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iPWo4\/yT\/l\/id_ID\/PuSsMB3wfw7.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "ye1tO": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iM2j4\/y6\/l\/id_ID\/2E4O521zySt.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "s+oSo": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yG\/r\/mqL1uw4oPQh.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "HlKd3": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yq\/l\/0,cross\/JIFcyK5YRcB.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "314BA": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3igEe4\/yO\/l\/id_ID\/gU5qVWuHtpm.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "43d0h": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iNnE4\/yH\/l\/id_ID\/GCqwvpP0j8-.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "3XM9q": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iKLX4\/y8\/l\/id_ID\/P0K28qMx3Ta.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "wveoP": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yR\/r\/hFwCHGerSKR.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "NmkkO": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ird84\/y1\/l\/id_ID\/6clTRGqw0-U.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "UeCbG": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3irQu4\/yK\/l\/id_ID\/9u8DEx_GKvv.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "K\/J49": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i-wV4\/yI\/l\/id_ID\/TA_sPXS-kHl.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "kjvo6": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yC\/l\/0,cross\/c6Z2m1hMWG9.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "QNBpb": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yi\/r\/dXS26AC2_zm.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "HKr3G": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yf\/r\/l0I0-s8ot1C.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "gcDYl": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yL\/r\/WxXz_vNVKCj.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "tBF0I": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y9\/l\/0,cross\/yP6F2hKjPf9.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "AWcOa": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yl\/r\/yfeyEeLGKBT.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "+23Eb": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iRbN4\/yS\/l\/id_ID\/x3NKD7FfORF.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "Rkigw": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3irw44\/yO\/l\/id_ID\/mJyAchuXX1B.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "LPUcP": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yj\/l\/0,cross\/pmSyp8L0mNs.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "9QGYI": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yt\/l\/0,cross\/NR7ynEhHcOn.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "PqlDR": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ye\/l\/0,cross\/_llWDEL_Pqf.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "DdUQn": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yy\/l\/0,cross\/Hx23qzl5oQm.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "sGv\/p": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yB\/r\/KHlkmSvjglT.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "jzmT8": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i7734\/yA\/l\/id_ID\/M58vpEPNqzS.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "\/W\/tp": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ih5j4\/ya\/l\/id_ID\/rZdpMAdOaRA.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "3oEko": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yc\/l\/0,cross\/8mHCO_GNlhP.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "fbq\/C": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iEIU4\/yM\/l\/id_ID\/H6OAhrx_gEc.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "hGm0b": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yz\/r\/Rck_oLAev3i.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "hnBhv": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yW\/r\/dLNDW4H72f3.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "D5D\/L": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ihm74\/y5\/l\/id_ID\/QgiddXqpbrb.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "\/2dle": {
                    "type": "css",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yN\/l\/0,cross\/USIBM0B6bOJ.css?_nc_x=Ij3Wp8lg5Kz"
                },
                "BQs0L": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iql24\/yd\/l\/id_ID\/EiWJrtEVZZr.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "utslv": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iKIO4\/yZ\/l\/id_ID\/3O3Bg50IE2a.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "ZPuVe": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iO534\/yj\/l\/id_ID\/d7E-C-SihYG.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "\/9a8Y": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i4WJ4\/y2\/l\/id_ID\/Ei1GfuC8C8u.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "YbJLq": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iLt94\/yM\/l\/id_ID\/2R8fnRCkTm7.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "JcbzV": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yI\/r\/V4LBDVcwNUE.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "TDBYU": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3inT74\/yC\/l\/id_ID\/N-1s1LbbNnd.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "K0mn\/": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yt\/r\/M7ZAVro0ED-.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "gWMJg": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yH\/r\/iGksp69foR_.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "ZU1ro": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yU\/r\/QKWIqWeZBgJ.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "sGe+Z": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ya\/r\/JjU0WcjV29H.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "uYbVb": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yO\/r\/yncgZiC7BC6.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "Hx+az": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yf\/r\/zO5MojAgN8I.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "9Zaf3": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yA\/r\/dQ_TzJobF0o.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "guyBW": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iVOP4\/yd\/l\/id_ID\/BYOj6_vV3NS.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "e2m5f": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yw\/r\/Cx2LGcHDfK9.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "9dEUx": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yP\/r\/xySBihMJacJ.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "RihI\/": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iiLd4\/yP\/l\/id_ID\/m6kavsMqNaR.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "i37fx": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i1nu4\/y_\/l\/id_ID\/WIPpZPDyWeb.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "WqRg5": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iTfb4\/y4\/l\/id_ID\/pD_JdQ_zxlg.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "8ELCB": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ye\/r\/4c56_sYLseJ.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "WO08q": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yn\/r\/8139hIgwWs8.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "+ClWy": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yt\/r\/J0b8GyNR1i5.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "oE4Do": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y2\/r\/eAdKAwutbmm.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "kBBAq": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iV7r4\/yL\/l\/id_ID\/3hhtUXBbCn9.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "D3rkb": {
                    "type": "js",
                    "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iGbG4\/yB\/l\/id_ID\/OIEQTztGRhk.js?_nc_x=Ij3Wp8lg5Kz"
                },
                "P\/mr5": {
                    "type": "css",
                    "src": "data:text\/css; charset=utf-8,\u002523bootloader_P_mr5{height:42px;}.bootloader_P_mr5{display:block!important;}",
                    "nc": 1,
                    "d": 1
                }
            });
            Bootloader.enableBootload({
                "BanzaiODS": {
                    "r": ["qfbWa", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    }
                },
                "BanzaiScuba": {
                    "r": ["qfbWa", "gpBff", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"]
                    }
                },
                "VisualCompletionGating": {
                    "r": ["BQnfj"]
                },
                "AsyncSignal": {
                    "r": ["qfbWa", "RPdWa", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["OMEWu", "gpBff"]
                    },
                    "be": 1
                },
                "Dock": {
                    "r": ["gcfsm", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "yEq6L", "NMZma", "9appw", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "TimeSliceInteractionsLiteTypedLogger": {
                    "r": ["qfbWa", "5IVcE", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "WebSpeedInteractionsTypedLogger": {
                    "r": ["qfbWa", "Wx0D\/", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "AsyncRequest": {
                    "r": ["ipo9U", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "DOM": {
                    "r": ["qfbWa", "YfXA3", "OMEWu", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["9appw", "gpBff"]
                    },
                    "be": 1
                },
                "Form": {
                    "r": ["qfbWa", "YfXA3", "OMEWu", "NMZma", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["9appw", "gpBff"]
                    },
                    "be": 1
                },
                "FormSubmit": {
                    "r": ["ipo9U", "n9JHX", "qfbWa", "jTpSi", "YfXA3", "OMEWu", "NMZma", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "Input": {
                    "r": ["YfXA3", "NMZma"],
                    "be": 1
                },
                "Live": {
                    "r": ["qfbWa", "YfXA3", "2\/maQ", "OMEWu", "RPdWa", "yEq6L", "9appw", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "Toggler": {
                    "r": ["gcfsm", "qfbWa", "YfXA3", "OMEWu", "NMZma", "9appw", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "Tooltip": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "UI8W7", "4Cr1A", "NMZma", "9appw", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "URI": {
                    "r": [],
                    "be": 1
                },
                "trackReferrer": {
                    "r": [],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["qfbWa", "gpBff", "OMEWu", "9appw"]
                    },
                    "be": 1
                },
                "PhotoTagApproval": {
                    "r": ["ZXAPn", "qfbWa", "YfXA3", "\/mnVq", "OMEWu", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["9appw", "gpBff"]
                    },
                    "be": 1
                },
                "PhotoSnowlift": {
                    "r": ["ipo9U", "ZXAPn", "gcfsm", "n9JHX", "1HhKv", "S77wK", "qfbWa", "KdpN\/", "nmT6P", "X7Iah", "4Kn\/e", "tpBYj", "YfXA3", "XU++e", "9YeUO", "np5Vl", "oVDMp", "SV7+Y", "8fZ3C", "OMEWu", "UI8W7", "Nnw3O", "4Cr1A", "hVrIs", "NDjaz", "RdEya", "RPdWa", "WHVQM", "yEq6L", "ls3J9", "8900w", "genvu", "HaxML", "dfnvL", "ye1tO", "An6bw", "NMZma", "9appw", "s+oSo", "HlKd3", "314BA", "43d0h", "3XM9q", "wveoP", "NmkkO", "BQnfj", "gpBff", "9heBT"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba", "VisualCompletionGating"]
                    },
                    "be": 1
                },
                "PhotoTagger": {
                    "r": ["ipo9U", "ZXAPn", "gcfsm", "n9JHX", "1HhKv", "qfbWa", "UeCbG", "KdpN\/", "K\/J49", "kjvo6", "4Kn\/e", "QNBpb", "YfXA3", "XU++e", "9YeUO", "oVDMp", "SV7+Y", "8fZ3C", "OMEWu", "UI8W7", "4Cr1A", "HKr3G", "hVrIs", "NDjaz", "gcDYl", "tBF0I", "RdEya", "AWcOa", "RPdWa", "WHVQM", "+23Eb", "Rkigw", "LPUcP", "9QGYI", "yEq6L", "8900w", "PqlDR", "HaxML", "DdUQn", "sGv\/p", "jzmT8", "\/W\/tp", "ye1tO", "An6bw", "NMZma", "9appw", "3oEko", "314BA", "fbq\/C", "43d0h", "hGm0b", "hnBhv", "D5D\/L", "\/2dle", "BQs0L", "utslv", "ZPuVe", "NmkkO", "BQnfj", "gpBff", "9heBT", "np5Vl"],
                    "rds": {
                        "m": ["PresenceStatus", "BanzaiODS", "BanzaiScuba", "VisualCompletionGating"]
                    },
                    "be": 1
                },
                "PhotoTags": {
                    "r": ["ZXAPn", "qfbWa", "YfXA3", "\/mnVq", "OMEWu", "9appw", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "TagTokenizer": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "S77wK", "qfbWa", "YfXA3", "\/mnVq", "\/9a8Y", "YbJLq", "OMEWu", "JcbzV", "NMZma", "9appw", "ch1+J"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "AsyncDialog": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "UI8W7", "ye1tO", "NMZma", "9appw", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "Hovercard": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "UI8W7", "4Cr1A", "RPdWa", "jzmT8", "ye1tO", "NMZma", "9appw", "hnBhv", "\/2dle", "9heBT", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "Banzai": {
                    "r": ["qfbWa", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "ResourceTimingBootloaderHelper": {
                    "r": ["OMEWu", "TDBYU"],
                    "rds": {
                        "m": ["BanzaiODS", "VisualCompletionGating", "BanzaiScuba"],
                        "r": ["qfbWa", "BQnfj", "9appw", "gpBff"]
                    },
                    "be": 1
                },
                "TimeSliceHelper": {
                    "r": ["K0mn\/"],
                    "be": 1
                },
                "XSalesPromoWWWDetailsDialogAsyncController": {
                    "r": ["9appw", "gWMJg"],
                    "be": 1
                },
                "BanzaiStream": {
                    "r": ["qfbWa", "ZU1ro", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "SnappyCompressUtil": {
                    "r": ["9appw"],
                    "be": 1
                },
                "GeneratedArtilleryUserTimingSink": {
                    "r": ["sGe+Z", "uYbVb", "Hx+az", "9Zaf3"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["qfbWa", "OMEWu", "9appw", "gpBff"]
                    },
                    "be": 1
                },
                "XOfferController": {
                    "r": ["guyBW", "9appw"],
                    "be": 1
                },
                "PerfXSharedFields": {
                    "r": ["RdEya"],
                    "be": 1
                },
                "KeyEventTypedLogger": {
                    "r": ["qfbWa", "e2m5f", "OMEWu", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "Animation": {
                    "r": ["1HhKv", "qfbWa", "YfXA3", "OMEWu", "NMZma", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["9appw", "gpBff"]
                    },
                    "be": 1
                },
                "Dialog": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "1HhKv", "qfbWa", "YfXA3", "OMEWu", "WHVQM", "NMZma", "9appw", "NmkkO", "9heBT", "XU++e", "np5Vl", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba", "VisualCompletionGating"],
                        "r": ["gpBff", "BQnfj"]
                    },
                    "be": 1
                },
                "ExceptionDialog": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "qfbWa", "4Kn\/e", "YfXA3", "OMEWu", "UI8W7", "i37fx", "RdEya", "WqRg5", "ye1tO", "NMZma", "9appw", "fbq\/C", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "ReactDOM": {
                    "r": ["qfbWa", "OMEWu", "NMZma", "An6bw", "9appw", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "QuickSandSolver": {
                    "r": ["ipo9U", "n9JHX", "qfbWa", "8ELCB", "YfXA3", "WO08q", "OMEWu", "+ClWy", "NMZma", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "ConfirmationDialog": {
                    "r": ["qfbWa", "YfXA3", "OMEWu", "NMZma", "oE4Do", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["9appw", "gpBff"]
                    },
                    "be": 1
                },
                "ContextualLayerInlineTabOrder": {
                    "r": ["gcfsm", "qfbWa", "kBBAq", "YfXA3", "OMEWu", "NMZma", "9appw", "hnBhv", "ipo9U"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "React": {
                    "r": ["qfbWa", "OMEWu", "An6bw", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "XUIDialogButton.react": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "UI8W7", "ye1tO", "NMZma", "9appw", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "XUIDialogBody.react": {
                    "r": ["ipo9U", "qfbWa", "OMEWu", "UI8W7", "ye1tO", "An6bw", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "XUIDialogFooter.react": {
                    "r": ["ipo9U", "gcfsm", "qfbWa", "OMEWu", "UI8W7", "ye1tO", "NMZma", "An6bw", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "XUIDialogTitle.react": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "UI8W7", "ye1tO", "NMZma", "9appw", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "XUIGrayText.react": {
                    "r": ["ipo9U", "qfbWa", "OMEWu", "i37fx", "ye1tO", "An6bw", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "PageTransitions": {
                    "r": ["NmkkO", "ipo9U", "n9JHX", "qfbWa", "YfXA3", "XU++e", "np5Vl", "OMEWu", "NMZma", "9appw", "An6bw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba", "VisualCompletionGating"],
                        "r": ["gpBff", "BQnfj"]
                    },
                    "be": 1
                },
                "DialogX": {
                    "r": ["ipo9U", "gcfsm", "n9JHX", "qfbWa", "YfXA3", "OMEWu", "UI8W7", "ye1tO", "NMZma", "9appw"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["gpBff"]
                    },
                    "be": 1
                },
                "CSSFade": {
                    "r": ["ipo9U", "qfbWa", "OMEWu", "NMZma"],
                    "rds": {
                        "m": ["BanzaiODS", "BanzaiScuba"],
                        "r": ["9appw", "gpBff"]
                    },
                    "be": 1
                }
            });
        });
    </script>
    <script>
        requireLazy(["InitialJSLoader"], function(InitialJSLoader) {
            InitialJSLoader.loadOnDOMContentReady(["BQnfj", "9dEUx", "NmkkO", "1HhKv", "qfbWa", "OMEWu", "NMZma", "9appw", "RihI\/", "hGm0b", "gpBff", "n9JHX", "kBBAq", "YfXA3", "9YeUO", "yEq6L", "D3rkb", "RdEya", "RPdWa", "JcbzV", "ye1tO", "An6bw", "XU++e", "np5Vl", "4Cr1A", "P\/mr5"]);
        });
    </script>
    <script>
        require("TimeSliceImpl").guard(function() {
            require("ServerJSDefine").handleDefines([
                ["AsyncRequestConfig", [], {
                    "retryOnNetworkError": "1",
                    "useFetchStreamAjaxPipeTransport": false
                }, 328],
                ["FbtLogger", [], {
                    "logger": null
                }, 288],
                ["FbtResultGK", [], {
                    "shouldReturnFbtResult": true,
                    "inlineMode": "NO_INLINE"
                }, 876],
                ["IntlPhonologicalRules", [], {
                    "meta": {},
                    "patterns": {}
                }, 1496],
                ["IntlViewerContext", [], {
                    "GENDER": 3
                }, 772],
                ["NumberFormatConfig", [], {
                    "decimalSeparator": ",",
                    "numberDelimiter": ".",
                    "minDigitsForThousandsSeparator": 4,
                    "standardDecimalPatternInfo": {
                        "primaryGroupSize": 3,
                        "secondaryGroupSize": 3
                    },
                    "numberingSystemData": null
                }, 54],
                ["SessionNameConfig", [], {
                    "seed": "1mBL"
                }, 757],
                ["ZeroCategoryHeader", [], {}, 1127],
                ["KSConfig", [], {
                    "killed": {
                        "__set": ["POCKET_MONSTERS_CREATE", "POCKET_MONSTERS_DELETE", "VIDEO_DIMENSIONS_FROM_PLAYER_IN_UPLOAD_DIALOG", "PREVENT_INFINITE_URL_REDIRECT", "POCKET_MONSTERS_UPDATE_NAME", "ADS_PLACEMENT_FIX_PUBLISHER_PLATFORMS_MUTATION", "MOBILITY_KILL_OLD_VISIBILITY_POSITION_SETTING", "WORKPLACE_DISPLAY_TEXT_EVIDENCE_REPORTING", "DYNAMIC_ADS_SET_CATALOG_AND_PRODUCT_SET_TOGETHER", "UNIDASH_DATA_FORMAT_CHANGE", "BUSINESS_GRAPH_SETTING_APP_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_WABA_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_ESG_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_PRODUCT_CATALOG_ASSIGNED_USERS_NEW_API", "BUSINESS_MANAGER_SHOW_UI_HIDDEN_TASK_FOR_ASSET", "BUSINESS_GRAPH_SETTING_BU_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_SESG_ASSIGNED_USERS_NEW_API", "ADS_MANAGER_ATA", "RECRUITING_REQUISITION_VALIDATE_COMPANY_GROUPING_ON_LINK"]
                    },
                    "ko": {
                        "__set": ["acrJTh9WGdp", "1oOE64fL4wO", "2dhqRnqXGLQ", "alHyDgpJdsZ", "7r6mSP7ofr2", "1ntjZ2zgf03", "3oh5Mw86USj", "8NAceEy9JZo", "5mNEXob0nTj", "6bdKsf1Fnc6", "4j36SVzvP3w", "8PlKuowafe8", "53gCxKq281G", "3yzzwBY7Npj", "4NbCsulUUI3", "4NSq3ZC4ScE", "1onzIv0jH6H", "6EkCidAZKFx", "5LSlJUj3BnT"]
                    }
                }, 2580],
                ["IntlHoldoutGK", [], {
                    "inIntlHoldout": false
                }, 2827],
                ["IntlNumberTypeConfig", [], {
                    "impl": "return IntlVariations.NUMBER_OTHER;"
                }, 3405],
                ["LinkshimHandlerConfig", [], {
                    "supports_meta_referrer": true,
                    "default_meta_referrer_policy": "origin-when-crossorigin",
                    "switched_meta_referrer_policy": "origin",
                    "non_linkshim_lnfb_mode": null,
                    "link_react_default_hash": "AT26-fwQ2emQGkK9kLm1VR2CBoaqczkNLT8Aj5chAn4eIShE6qrQ4Ntt4qgJXcQV7f2MXI67vly4gNt3QexMJK7-N5ypVXL0Ux8If9A5h6eaRzLlgWT9a92LG8XccpFTQ6bzkCkZVN4apQ",
                    "untrusted_link_default_hash": "AT1ymYrb368k_4awHfVfKUeb-qQBbDrrryRv44X5HAfHXMl3f5Vq_VgcOhQ9k0Y-J-ja1EekdMDGRaaqo7Re_NzTZa9Jf6Fh_X2jwjt-MCcYih60BrQAIphWoyuJlqO925Kon3qKO0hvXA",
                    "linkshim_host": "l.facebook.com",
                    "use_rel_no_opener": true,
                    "always_use_https": true,
                    "onion_always_shim": true,
                    "middle_click_requires_event": true,
                    "www_safe_js_mode": "asynclazy",
                    "m_safe_js_mode": "MLynx_asynclazy",
                    "ghl_param_link_shim": false,
                    "click_ids": [],
                    "is_linkshim_supported": true,
                    "current_domain": "facebook.com"
                }, 27],
                ["FbtQTOverrides", [], {
                    "overrides": {}
                }, 551]
            ]);
            require("InitialJSLoader").handleServerJS({
                "instances": [
                    ["__inst_5b4d0c00_0_0", ["Menu", "XUIMenuWithSquareCorner", "XUIMenuTheme"],
                        [
                            [], {
                                "id": "u_0_0",
                                "behaviors": [{
                                    "__m": "XUIMenuWithSquareCorner"
                                }],
                                "theme": {
                                    "__m": "XUIMenuTheme"
                                }
                            }
                        ], 2
                    ],
                    ["__inst_5b4d0c00_0_1", ["Menu", "MenuItem", "__markup_3310c079_0_0", "HTML", "__markup_3310c079_0_1", "__markup_3310c079_0_2", "__markup_3310c079_0_3", "XUIMenuWithSquareCorner", "XUIMenuTheme"],
                        [
                            [{
                                "value": "key_shortcuts",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_0"
                                },
                                "label": "Bantuan pintasan keyboard...",
                                "title": "",
                                "className": null
                            }, {
                                "href": "\/help\/accessibility",
                                "target": "_blank",
                                "value": "help_center",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_1"
                                },
                                "label": "Pusat Bantuan Aksesibilitas",
                                "title": "",
                                "className": null
                            }, {
                                "href": "\/help\/contact\/accessibility",
                                "target": "_blank",
                                "value": "submit_feedback",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_2"
                                },
                                "label": "Kirim masukan",
                                "title": "",
                                "className": null
                            }, {
                                "href": "\/accessibility",
                                "target": "_blank",
                                "value": "facebook_page",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_3"
                                },
                                "label": "Update dari Aksesibilitas Facebook",
                                "title": "",
                                "className": null
                            }], {
                                "id": "u_0_1",
                                "behaviors": [{
                                    "__m": "XUIMenuWithSquareCorner"
                                }],
                                "theme": {
                                    "__m": "XUIMenuTheme"
                                }
                            }
                        ], 2
                    ],
                    ["__inst_e5ad243d_0_0", ["PopoverMenu", "__inst_1de146dc_0_1", "__elem_ec77afbd_0_1", "__inst_5b4d0c00_0_1"],
                        [{
                                "__m": "__inst_1de146dc_0_1"
                            }, {
                                "__m": "__elem_ec77afbd_0_1"
                            }, {
                                "__m": "__inst_5b4d0c00_0_1"
                            },
                            []
                        ], 2
                    ],
                    ["__inst_e5ad243d_0_1", ["PopoverMenu", "__inst_1de146dc_0_0", "__elem_ec77afbd_0_0", "__inst_5b4d0c00_0_0"],
                        [{
                                "__m": "__inst_1de146dc_0_0"
                            }, {
                                "__m": "__elem_ec77afbd_0_0"
                            }, {
                                "__m": "__inst_5b4d0c00_0_0"
                            },
                            []
                        ], 2
                    ],
                    ["__inst_1de146dc_0_0", ["Popover", "__elem_1de146dc_0_0", "__elem_ec77afbd_0_0", "ContextualLayerAutoFlip", "ContextualDialogArrow"],
                        [{
                                "__m": "__elem_1de146dc_0_0"
                            }, {
                                "__m": "__elem_ec77afbd_0_0"
                            },
                            [{
                                "__m": "ContextualLayerAutoFlip"
                            }, {
                                "__m": "ContextualDialogArrow"
                            }], {
                                "alignh": "left",
                                "position": "below"
                            }
                        ], 2
                    ],
                    ["__inst_1de146dc_0_1", ["Popover", "__elem_1de146dc_0_1", "__elem_ec77afbd_0_1", "ContextualLayerAutoFlip", "ContextualDialogArrow"],
                        [{
                                "__m": "__elem_1de146dc_0_1"
                            }, {
                                "__m": "__elem_ec77afbd_0_1"
                            },
                            [{
                                "__m": "ContextualLayerAutoFlip"
                            }, {
                                "__m": "ContextualDialogArrow"
                            }], {
                                "alignh": "right",
                                "position": "below"
                            }
                        ], 2
                    ],
                    ["__inst_ead1e565_0_0", ["DialogX", "LayerFadeOnHide", "LayerHideOnBlur", "LayerHideOnEscape", "DialogHideOnSuccess", "LayerHideOnTransition", "LayerRemoveOnHide", "__markup_9f5fac15_0_0", "HTML"],
                        [{
                            "width": 445,
                            "autohide": null,
                            "titleID": "u_0_2",
                            "redirectURI": null,
                            "fixedTopPosition": null,
                            "ignoreFixedTopInShortViewport": false,
                            "label": null,
                            "labelledBy": null,
                            "modal": true,
                            "xui": true,
                            "addedBehaviors": [{
                                "__m": "LayerFadeOnHide"
                            }, {
                                "__m": "LayerHideOnBlur"
                            }, {
                                "__m": "LayerHideOnEscape"
                            }, {
                                "__m": "DialogHideOnSuccess"
                            }, {
                                "__m": "LayerHideOnTransition"
                            }, {
                                "__m": "LayerRemoveOnHide"
                            }],
                            "classNames": ["_2rs6"]
                        }, {
                            "__m": "__markup_9f5fac15_0_0"
                        }], 2
                    ],
                    ["__inst_ead1e565_0_1", ["DialogX", "LayerFadeOnHide", "LayerHideOnBlur", "LayerHideOnEscape", "DialogHideOnSuccess", "LayerHideOnTransition", "LayerRemoveOnHide", "__markup_9f5fac15_0_1", "HTML"],
                        [{
                            "width": 445,
                            "autohide": null,
                            "titleID": "u_0_3",
                            "redirectURI": null,
                            "fixedTopPosition": null,
                            "ignoreFixedTopInShortViewport": false,
                            "label": null,
                            "labelledBy": null,
                            "modal": true,
                            "xui": true,
                            "addedBehaviors": [{
                                "__m": "LayerFadeOnHide"
                            }, {
                                "__m": "LayerHideOnBlur"
                            }, {
                                "__m": "LayerHideOnEscape"
                            }, {
                                "__m": "DialogHideOnSuccess"
                            }, {
                                "__m": "LayerHideOnTransition"
                            }, {
                                "__m": "LayerRemoveOnHide"
                            }],
                            "classNames": ["_2rs6"]
                        }, {
                            "__m": "__markup_9f5fac15_0_1"
                        }], 2
                    ],
                    ["__inst_41781d56_0_0", ["ContextualDialog", "ContextualDialogArrow", "ContextualDialogXUITheme", "LayerFadeOnShow", "LayerFadeOnHide", "LayerHideOnBlur", "LayerHideOnEscape", "DialogHideOnSuccess", "LayerHideOnTransition", "LayerRemoveOnHide", "LayerAutoFocus", "ContextualLayerAutoFlip", "LayerTabIsolation", "__markup_a588f507_0_0", "HTML"],
                        [{
                            "width": 312,
                            "context": null,
                            "contextID": "birthday-help",
                            "contextSelector": null,
                            "dialogRole": "dialog",
                            "labelledBy": "u_0_7",
                            "position": "left",
                            "alignment": "left",
                            "offsetX": 0,
                            "offsetY": 0,
                            "arrowBehavior": {
                                "__m": "ContextualDialogArrow"
                            },
                            "hoverShowDelay": null,
                            "hoverHideDelay": null,
                            "theme": {
                                "__m": "ContextualDialogXUITheme"
                            },
                            "addedBehaviors": [{
                                "__m": "LayerFadeOnShow"
                            }, {
                                "__m": "LayerFadeOnHide"
                            }, {
                                "__m": "LayerHideOnBlur"
                            }, {
                                "__m": "LayerHideOnEscape"
                            }, {
                                "__m": "DialogHideOnSuccess"
                            }, {
                                "__m": "LayerHideOnTransition"
                            }, {
                                "__m": "LayerRemoveOnHide"
                            }, {
                                "__m": "LayerAutoFocus"
                            }, {
                                "__m": "ContextualLayerAutoFlip"
                            }, {
                                "__m": "LayerTabIsolation"
                            }]
                        }, {
                            "__m": "__markup_a588f507_0_0"
                        }], 2
                    ],
                    ["__inst_41781d56_0_1", ["ContextualDialog", "ContextualDialogArrow", "ContextualDialogXUITheme", "LayerFadeOnShow", "LayerFadeOnHide", "LayerHideOnBlur", "LayerHideOnEscape", "DialogHideOnSuccess", "LayerHideOnTransition", "LayerRemoveOnHide", "LayerAutoFocus", "ContextualLayerAutoFlip", "LayerTabIsolation", "__markup_a588f507_0_1", "HTML"],
                        [{
                            "width": 312,
                            "context": null,
                            "contextID": "gender-help",
                            "contextSelector": null,
                            "dialogRole": "dialog",
                            "labelledBy": "u_0_c",
                            "position": "left",
                            "alignment": "left",
                            "offsetX": 0,
                            "offsetY": 0,
                            "arrowBehavior": {
                                "__m": "ContextualDialogArrow"
                            },
                            "hoverShowDelay": null,
                            "hoverHideDelay": null,
                            "theme": {
                                "__m": "ContextualDialogXUITheme"
                            },
                            "addedBehaviors": [{
                                "__m": "LayerFadeOnShow"
                            }, {
                                "__m": "LayerFadeOnHide"
                            }, {
                                "__m": "LayerHideOnBlur"
                            }, {
                                "__m": "LayerHideOnEscape"
                            }, {
                                "__m": "DialogHideOnSuccess"
                            }, {
                                "__m": "LayerHideOnTransition"
                            }, {
                                "__m": "LayerRemoveOnHide"
                            }, {
                                "__m": "LayerAutoFocus"
                            }, {
                                "__m": "ContextualLayerAutoFlip"
                            }, {
                                "__m": "LayerTabIsolation"
                            }]
                        }, {
                            "__m": "__markup_a588f507_0_1"
                        }], 2
                    ]
                ],
                "markup": [
                    ["__markup_3310c079_0_0", {
                        "__html": "Bantuan pintasan keyboard..."
                    }, 1],
                    ["__markup_3310c079_0_1", {
                        "__html": "Pusat Bantuan Aksesibilitas"
                    }, 1],
                    ["__markup_3310c079_0_2", {
                        "__html": "Kirim masukan"
                    }, 1],
                    ["__markup_3310c079_0_3", {
                        "__html": "Update dari Aksesibilitas Facebook"
                    }, 1],
                    ["__markup_9f5fac15_0_0", {
                        "__html": "\u003Cdiv>\u003Cdiv class=\"_4-i0\">\u003Cdiv class=\"clearfix\">\u003Cdiv class=\"_51-u rfloat _ohf\">\u003Ca role=\"button\" class=\"_42ft _5upp _50zy layerCancel _51-t _50-0 _50z-\" data-testid=\"dialog_title_close_button\" href=\"#\" title=\"Tutup\">Tutup\u003C\/a>\u003C\/div>\u003Cdiv>\u003Ch3 id=\"u_0_2\" class=\"_52c9\">Konfirmasikan Tanggal Lahir Anda\u003C\/h3>\u003C\/div>\u003C\/div>\u003C\/div>\u003Cdiv class=\"_4-i2 _pig _50f4\">Apakah \u003Cspan class=\"_2rs9\">21 Oktober 1994\u003C\/span> tanggal lahir Anda?\u003C\/div>\u003Cdiv class=\"_5lnf uiOverlayFooter _5a8u\">\u003Ca role=\"button\" class=\"_42ft _4jy0 layerCancel _2rsa uiOverlayButton _4jy3 _517h _51sy\" href=\"#\">Tidak\u003C\/a>\u003Cbutton value=\"1\" class=\"_42ft _4jy0 layerConfirm _2rsa uiOverlayButton _4jy3 _4jy1 selected _51sy\" type=\"submit\">Ya\u003C\/button>\u003C\/div>\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_1", {
                        "__html": "\u003Cdiv>\u003Cdiv class=\"_4-i0\" id=\"birthday_age_confirmation_dialog_title\">\u003Cdiv class=\"clearfix\">\u003Cdiv class=\"_51-u rfloat _ohf\">\u003Ca role=\"button\" class=\"_42ft _5upp _50zy layerCancel _51-t _50-0 _50z-\" data-testid=\"dialog_title_close_button\" href=\"#\" title=\"Tutup\">Tutup\u003C\/a>\u003C\/div>\u003Cdiv>\u003Ch3 id=\"u_0_3\" class=\"_52c9\">Ulang Tahun Anda akan Diatur ke 21 Oktober 1994\u003C\/h3>\u003C\/div>\u003C\/div>\u003C\/div>\u003Cdiv class=\"_4-i2 _pig _50f4\">Tidak seorang pun yang akan melihat ulang tahun Anda. Opsi ini bisa diubah di profil Anda nanti.\u003C\/div>\u003Cdiv class=\"_5lnf uiOverlayFooter _5a8u\">\u003Ca role=\"button\" class=\"_42ft _4jy0 layerCancel _2rsa uiOverlayButton _4jy3 _517h _51sy\" href=\"#\">Batalkan\u003C\/a>\u003Cbutton value=\"1\" class=\"_42ft _4jy0 layerConfirm _2rsa uiOverlayButton _4jy3 _4jy1 selected _51sy\" type=\"submit\">OK\u003C\/button>\u003C\/div>\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_0", {
                        "__html": "\u003Cdiv>\u003Cdiv class=\"_53iv\">\u003Cdiv>\u003Cdiv>\u003Cb>Mencantumkan tanggal lahir\u003C\/b> membantu memastikan Anda mendapatkan pengalaman Facebook yang tepat sesuai usia Anda. Jika Anda ingin mengubah siapa yang melihat ini, buka bagian Tentang pada profil Anda. Untuk rincian selengkapnya, harap kunjungi \u003Ca href=\"\/privacy\/explanation\/\">Kebijakan Data\u003C\/a> kami.\u003C\/div>\u003C\/div>\u003Cdiv aria-label=\"Explanation tooltip for birthday registration\" id=\"u_0_7\">\u003C\/div>\u003C\/div>\u003Cdiv class=\"_5lnf uiOverlayFooter _572u\">\u003Ca role=\"button\" class=\"_42ft _4jy0 layerCancel uiOverlayButton _4jy3 _4jy1 selected _51sy\" href=\"#\">Tutup\u003C\/a>\u003C\/div>\u003Ca aria-label=\"Tutup\" class=\"layer_close_elem accessible_elem\" href=\"#\" role=\"button\" id=\"u_0_8\" aria-labelledby=\"u_0_8 u_0_7\">\u003C\/a>\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_1", {
                        "__html": "\u003Cdiv>\u003Cdiv class=\"_53iv\">\u003Cdiv>\u003Cdiv>Anda bisa mengubah siapa yang bisa melihat jenis kelamin di profil nanti. Pilih Khusus untuk memilih jenis kelamin lain, atau jika Anda memilih tidak menjawab.\u003C\/div>\u003C\/div>\u003Cdiv aria-label=\"Explanation tooltip for gender options during registration\" id=\"u_0_c\">\u003C\/div>\u003C\/div>\u003Cdiv class=\"_5lnf uiOverlayFooter _572u\">\u003Ca role=\"button\" class=\"_42ft _4jy0 layerCancel uiOverlayButton _4jy3 _4jy1 selected _51sy\" href=\"#\">Tutup\u003C\/a>\u003C\/div>\u003Ca aria-label=\"Tutup\" class=\"layer_close_elem accessible_elem\" href=\"#\" role=\"button\" id=\"u_0_d\" aria-labelledby=\"u_0_d u_0_c\">\u003C\/a>\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_2", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Anda harus mengisi semua kolom.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_2", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Siapa nama Anda?\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_3", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Anda akan menggunakannya saat Anda ingin masuk dan jika Anda perlu untuk mengatur ulang kata sandi Anda.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_4", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Masukkan kombinasi dari setidaknya enam angka, huruf, dan tanda baca (misalnya ! dan &amp;).\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_3", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Masukkan alamat email yang valid.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_5", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Masukkan alamat email atau nomor ponsel yang valid.\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_4", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Harap masukkan nomor telepon atau alamat email yang valid.\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_5", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Masukkan kembali alamat email Anda.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_6", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Harap masukkan ulang nomor ponsel atau alamat email.\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_6", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Email Anda tidak cocok. Silakan coba lagi.\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_7", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Email atau nomor ponsel Anda tidak sesuai. Coba lagi.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_7", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Kelihatannya Anda memasukkan info yang salah. Harap pastikan untuk menggunakan tanggal lahir asli Anda.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_8", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Tambahkan usia Anda.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_9", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Pilih tanggal lahir Anda. Anda dapat mengubah siapa yang bisa melihat ini nanti.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_a", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Harap pilih jenis kelamin. Anda dapat mengubah siapa yang dapat melihat ini nanti.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_b", {
                        "__html": "\u003Cdiv class=\"_5633 _5634\">Pilih kata ganti Anda.\u003C\/div>"
                    }, 1],
                    ["__markup_a588f507_0_8", {
                        "__html": "\u003Cdiv class=\"_2zot\">\u003Cdiv class=\"_2zou\">Masukkan nomor ponsel atau email yang biasanya Anda gunakan.\u003C\/div>\u003Cdiv class=\"_2zow\">Anda akan menggunakannya untuk masuk ke akun Anda. Ini juga akan membantu Anda mengatur kata sandi jika diperlukan.\u003C\/div>\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_c", {
                        "__html": "\u003Cdiv class=\"_2acn\">\u003Cdiv class=\"_2aco\">Kekuatan kata sandi: \u003Cb class=\"_2acp\">Terlalu pendek\u003C\/b>\u003C\/div>\u003Cdiv class=\"_2act\">Anda membutuhkan minimal 6 karakter.\u003C\/div>\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_d", {
                        "__html": "\u003Cdiv class=\"_2acn\">\u003Cdiv class=\"_2aco\">Kekuatan kata sandi: \u003Cb class=\"_2acp\">Terlalu lemah\u003C\/b>\u003C\/div>\u003Cdiv class=\"_2act\">Pilih kata sandi yang unik dan sulit ditebak orang lain.\u003C\/div>\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_e", {
                        "__html": "\u003Cdiv class=\"_2acn\">\u003Cdiv class=\"_2aco\">Kekuatan kata sandi: \u003Cb class=\"_2acq\">Kuat\u003C\/b>\u003C\/div>\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_f", {
                        "__html": "\u003Cdiv class=\"_2acn _1pd1\">Harap tetapkan kata sandi.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_g", {
                        "__html": "\u003Cdiv class=\"_2acn _1pd1\">Anda membutuhkan minimal 6 karakter.\u003C\/div>"
                    }, 1],
                    ["__markup_9f5fac15_0_h", {
                        "__html": "\u003Cdiv class=\"_2acn _1pd1\">Harap pilih kata sandi yang lebih kuat.\u003C\/div>"
                    }, 1]
                ],
                "elements": [
                    ["__elem_835c633a_0_0", "login_form", 1],
                    ["__elem_1edd4980_0_0", "loginbutton", 1],
                    ["__elem_f46f4946_0_0", "u_0_5", 1],
                    ["__elem_f46f4946_0_1", "u_0_6", 1],
                    ["__elem_a588f507_0_1", "u_0_e", 1],
                    ["__elem_3fc3da18_0_0", "u_0_f", 1],
                    ["__elem_51be6cb7_0_0", "u_0_g", 1],
                    ["__elem_1de146dc_0_0", "u_0_h", 1],
                    ["__elem_ec77afbd_0_0", "u_0_i", 2],
                    ["__elem_1de146dc_0_1", "u_0_j", 1],
                    ["__elem_ec77afbd_0_1", "u_0_k", 2],
                    ["__elem_9f5fac15_0_5", "pagelet_bluebar", 1],
                    ["__elem_45e94dd8_0_0", "pagelet_bluebar", 1],
                    ["__elem_a588f507_0_0", "globalContainer", 2],
                    ["__elem_a588f507_0_2", "content", 1],
                    ["__elem_835c633a_0_1", "reg", 1],
                    ["__elem_9ae3fd6f_0_0", "u_0_l", 1],
                    ["__elem_3f8a34cc_0_0", "u_0_m", 3],
                    ["__elem_9ae3fd6f_0_1", "u_0_n", 1],
                    ["__elem_3f8a34cc_0_1", "u_0_o", 3],
                    ["__elem_9f5fac15_0_1", "u_0_p", 1],
                    ["__elem_9ae3fd6f_0_2", "u_0_q", 1],
                    ["__elem_3f8a34cc_0_2", "u_0_r", 2],
                    ["__elem_9f5fac15_0_0", "u_0_s", 1],
                    ["__elem_9ae3fd6f_0_3", "u_0_t", 1],
                    ["__elem_3f8a34cc_0_3", "u_0_u", 2],
                    ["__elem_9f5fac15_0_3", "u_0_v", 1],
                    ["__elem_3f8a34cc_0_4", "u_0_w", 1],
                    ["__elem_9f5fac15_0_2", "password_field", 1],
                    ["__elem_9ae3fd6f_0_4", "u_0_x", 1],
                    ["__elem_3f8a34cc_0_5", "u_0_y", 2],
                    ["__elem_ffa3c607_0_0", "birthday_wrapper", 1],
                    ["__elem_2a23d31e_0_0", "u_0_z", 1],
                    ["__elem_072b8e64_0_1", "birthday-help", 1],
                    ["__elem_97e096cf_0_0", "u_0_10", 1],
                    ["__elem_2a23d31e_0_1", "u_0_11", 1],
                    ["__elem_072b8e64_0_2", "gender-help", 1],
                    ["__elem_9f5fac15_0_4", "u_0_12", 2],
                    ["__elem_3f8a34cc_0_6", "u_0_13", 1],
                    ["__elem_ef03ea1a_0_0", "u_0_14", 1],
                    ["__elem_ddac73b6_0_0", "u_0_15", 1],
                    ["__elem_da4ef9a3_0_0", "u_0_16", 1],
                    ["__elem_8937e029_0_0", "captcha_response", 1],
                    ["__elem_a32d506f_0_0", "captcha-recaptcha", 1],
                    ["__elem_a431e88a_0_0", "captcha-recaptcha", 1],
                    ["__elem_a588f507_0_4", "captcha_buttons", 1],
                    ["__elem_072b8e64_0_0", "u_0_17", 1],
                    ["__elem_ddac73b6_0_1", "u_0_18", 1],
                    ["__elem_da4ef9a3_0_1", "u_0_19", 1],
                    ["__elem_a588f507_0_3", "reg_pages_msg", 1]
                ],
                "require": [
                    ["WebPixelRatioDetector", "startDetecting", [],
                        [false]
                    ],
                    ["ServiceWorkerLoginAndLogout", "login", [],
                        []
                    ],
                    ["ScriptPath", "set", [],
                        ["\/", "a6bebc6e", {
                            "imp_id": "0LrPiRVmAoDqF5fPH",
                            "ef_page": null,
                            "uri": "https:\/\/www.facebook.com\/"
                        }]
                    ],
                    ["UITinyViewportAction", "init", [],
                        []
                    ],
                    ["ResetScrollOnUnload", "init", ["__elem_a588f507_0_0"],
                        [{
                            "__m": "__elem_a588f507_0_0"
                        }]
                    ],
                    ["AccessibilityWebVirtualCursorClickLogger", "init", ["__elem_45e94dd8_0_0", "__elem_a588f507_0_0"],
                        [
                            [{
                                "__m": "__elem_45e94dd8_0_0"
                            }, {
                                "__m": "__elem_a588f507_0_0"
                            }]
                        ]
                    ],
                    ["KeyboardActivityLogger", "init", [],
                        []
                    ],
                    ["FocusRing", "init", [],
                        []
                    ],
                    ["HardwareCSS", "init", [],
                        []
                    ],
                    ["NavigationAssistantController", "init", ["__elem_3fc3da18_0_0", "__elem_51be6cb7_0_0", "__inst_5b4d0c00_0_0", "__inst_5b4d0c00_0_1", "__inst_e5ad243d_0_0", "__inst_e5ad243d_0_1"],
                        [{
                            "__m": "__elem_3fc3da18_0_0"
                        }, {
                            "__m": "__elem_51be6cb7_0_0"
                        }, {
                            "__m": "__inst_5b4d0c00_0_0"
                        }, {
                            "__m": "__inst_5b4d0c00_0_1"
                        }, null, {
                            "accessibilityPopoverMenu": {
                                "__m": "__inst_e5ad243d_0_0"
                            },
                            "globalPopoverMenu": null,
                            "sectionsPopoverMenu": {
                                "__m": "__inst_e5ad243d_0_1"
                            }
                        }]
                    ],
                    ["__inst_e5ad243d_0_1"],
                    ["__inst_1de146dc_0_0"],
                    ["__inst_e5ad243d_0_0"],
                    ["__inst_1de146dc_0_1"],
                    ["AsyncRequestNectarLogging"],
                    ["IntlUtils"],
                    ["FBLynx", "setupDelegation", [],
                        []
                    ],
                    ["TimezoneAutoset", "setInputValue", ["__elem_f46f4946_0_0"],
                        [{
                            "__m": "__elem_f46f4946_0_0"
                        }, 1571726538]
                    ],
                    ["ScreenDimensionsAutoSet", "setInputValue", ["__elem_f46f4946_0_1"],
                        [{
                            "__m": "__elem_f46f4946_0_1"
                        }]
                    ],
                    ["LoginFormController", "init", ["__elem_835c633a_0_0", "__elem_1edd4980_0_0"],
                        [{
                            "__m": "__elem_835c633a_0_0"
                        }, {
                            "__m": "__elem_1edd4980_0_0"
                        }, null, true, {
                            "shouldRunBotDetection": true
                        }]
                    ],
                    ["BrowserPrefillLogging", "initContactpointFieldLogging", [],
                        [{
                            "contactpointFieldID": "email",
                            "serverPrefill": ""
                        }]
                    ],
                    ["BrowserPrefillLogging", "initPasswordFieldLogging", [],
                        [{
                            "passwordFieldID": "pass"
                        }]
                    ],
                    ["Sketch", "solveAndUpdateForm", [],
                        ["fec5747382e8ec9c725aedd0062dbf57", "76a1d980e2098f829741db23a4f5352f", 5, "login_form"]
                    ],
                    ["Sketch", "solveAndUpdateForm", [],
                        ["fec5747382e8ec9c725aedd0062dbf57", "76a1d980e2098f829741db23a4f5352f", 5, "reg"]
                    ],
                    ["__inst_ead1e565_0_0"],
                    ["__inst_ead1e565_0_1"],
                    ["RegistrationController", "init", ["__elem_835c633a_0_1", "__elem_ddac73b6_0_0", "__elem_ddac73b6_0_1", "__elem_072b8e64_0_0", "__elem_ef03ea1a_0_0", "__elem_a588f507_0_3", "__elem_a588f507_0_4", "__elem_da4ef9a3_0_0", "__elem_da4ef9a3_0_1", "__elem_9f5fac15_0_0", "__elem_9f5fac15_0_1", "__elem_9f5fac15_0_2", "__elem_9f5fac15_0_3", "__inst_ead1e565_0_0", "__inst_ead1e565_0_1"],
                        [{
                            "regForm": {
                                "__m": "__elem_835c633a_0_1"
                            },
                            "log_focus_name": "form_focus",
                            "regButton": {
                                "__m": "__elem_ddac73b6_0_0"
                            },
                            "captchaRegButton": {
                                "__m": "__elem_ddac73b6_0_1"
                            },
                            "captchaBackButton": {
                                "__m": "__elem_072b8e64_0_0"
                            },
                            "tos_container": {
                                "__m": "__elem_ef03ea1a_0_0"
                            },
                            "pages_link": {
                                "__m": "__elem_a588f507_0_3"
                            },
                            "captcha_buttons": {
                                "__m": "__elem_a588f507_0_4"
                            },
                            "async_status": {
                                "__m": "__elem_da4ef9a3_0_0"
                            },
                            "captcha_async_status": {
                                "__m": "__elem_da4ef9a3_0_1"
                            },
                            "confirmContactpointBehavior": "show_for_email-fade",
                            "confirm_component": {
                                "__m": "__elem_9f5fac15_0_0"
                            },
                            "errorMessageNewDesign": false,
                            "email_component": {
                                "__m": "__elem_9f5fac15_0_1"
                            },
                            "password_component": {
                                "__m": "__elem_9f5fac15_0_2"
                            },
                            "show_tooltips": false,
                            "second_cp_component": {
                                "__m": "__elem_9f5fac15_0_3"
                            },
                            "no_phone_reg_link": null,
                            "allow_email_reg_dialog": null,
                            "shouldShowConfirmationDialog": true,
                            "birthdayConfirmationDialog": {
                                "__m": "__inst_ead1e565_0_0"
                            },
                            "ageConfirmationDialog": {
                                "__m": "__inst_ead1e565_0_1"
                            },
                            "shouldShowBirthdaySelectors": false,
                            "prefilledBirthday": {
                                "day": "21",
                                "month": "10",
                                "year": "1994"
                            },
                            "savePasswordNode": null,
                            "characterThreshold": 0,
                            "topEmailDomains": null,
                            "noReEnterOnSuggestion": false,
                            "persistURI": null,
                            "hideReEnterOnEmail": false,
                            "inReEnterExperiment": false,
                            "payload": null,
                            "shouldRunBotDetection": false
                        }]
                    ],
                    ["FocusListener"],
                    ["FlipDirectionOnKeypress"],
                    ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_0", "__elem_3f8a34cc_0_0"],
                        [{
                            "__m": "__elem_9ae3fd6f_0_0"
                        }, {
                            "__m": "__elem_3f8a34cc_0_0"
                        }, "left", "flyout_design", true, {
                            "showHintFlyout": false,
                            "showPasswordMeter": false,
                            "passwordMeterID": "",
                            "minPasswordMeterStrength": 35,
                            "passwordMeterHidden": false
                        }]
                    ],
                    ["RegistrationGenderPronounWarning", "registerNameInput", ["__elem_3f8a34cc_0_0"],
                        ["firstname", {
                            "__m": "__elem_3f8a34cc_0_0"
                        }]
                    ],
                    ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_0"],
                        [{
                            "__m": "__elem_3f8a34cc_0_0"
                        }]
                    ],
                    ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_1", "__elem_3f8a34cc_0_1"],
                        [{
                            "__m": "__elem_9ae3fd6f_0_1"
                        }, {
                            "__m": "__elem_3f8a34cc_0_1"
                        }, "below", "flyout_design", true, {
                            "showHintFlyout": false,
                            "showPasswordMeter": false,
                            "passwordMeterID": "",
                            "minPasswordMeterStrength": 35,
                            "passwordMeterHidden": false
                        }]
                    ],
                    ["RegistrationGenderPronounWarning", "registerNameInput", ["__elem_3f8a34cc_0_1"],
                        ["lastname", {
                            "__m": "__elem_3f8a34cc_0_1"
                        }]
                    ],
                    ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_1"],
                        [{
                            "__m": "__elem_3f8a34cc_0_1"
                        }]
                    ],
                    ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_2", "__elem_3f8a34cc_0_2"],
                        [{
                            "__m": "__elem_9ae3fd6f_0_2"
                        }, {
                            "__m": "__elem_3f8a34cc_0_2"
                        }, "left", "flyout_design", true, {
                            "showHintFlyout": false,
                            "showPasswordMeter": false,
                            "passwordMeterID": "",
                            "minPasswordMeterStrength": 35,
                            "passwordMeterHidden": false
                        }]
                    ],
                    ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_2"],
                        [{
                            "__m": "__elem_3f8a34cc_0_2"
                        }]
                    ],
                    ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_3", "__elem_3f8a34cc_0_3"],
                        [{
                            "__m": "__elem_9ae3fd6f_0_3"
                        }, {
                            "__m": "__elem_3f8a34cc_0_3"
                        }, "left", "flyout_design", true, {
                            "showHintFlyout": false,
                            "showPasswordMeter": false,
                            "passwordMeterID": "",
                            "minPasswordMeterStrength": 35,
                            "passwordMeterHidden": false
                        }]
                    ],
                    ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_3"],
                        [{
                            "__m": "__elem_3f8a34cc_0_3"
                        }]
                    ],
                    ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_4"],
                        [{
                            "__m": "__elem_3f8a34cc_0_4"
                        }]
                    ],
                    ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_4", "__elem_3f8a34cc_0_5"],
                        [{
                            "__m": "__elem_9ae3fd6f_0_4"
                        }, {
                            "__m": "__elem_3f8a34cc_0_5"
                        }, "left", "flyout_design", true, {
                            "showHintFlyout": false,
                            "showPasswordMeter": false,
                            "passwordMeterID": "",
                            "minPasswordMeterStrength": 35,
                            "passwordMeterHidden": false
                        }]
                    ],
                    ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_5"],
                        [{
                            "__m": "__elem_3f8a34cc_0_5"
                        }]
                    ],
                    ["__inst_41781d56_0_0"],
                    ["RegistrationController", "initInformationLinkDialog", ["__elem_072b8e64_0_1", "__inst_41781d56_0_0"],
                        [{
                            "__m": "__elem_072b8e64_0_1"
                        }, {
                            "__m": "__inst_41781d56_0_0"
                        }]
                    ],
                    ["RegistrationInlineValidations", "register", ["__elem_ffa3c607_0_0", "__elem_2a23d31e_0_0"],
                        [{
                            "__m": "__elem_ffa3c607_0_0"
                        }, {
                            "__m": "__elem_2a23d31e_0_0"
                        }, "left", "flyout_design", false]
                    ],
                    ["__inst_41781d56_0_1"],
                    ["RegistrationController", "initInformationLinkDialog", ["__elem_072b8e64_0_2", "__inst_41781d56_0_1"],
                        [{
                            "__m": "__elem_072b8e64_0_2"
                        }, {
                            "__m": "__inst_41781d56_0_1"
                        }]
                    ],
                    ["RegistrationInlineValidations", "register", ["__elem_97e096cf_0_0", "__elem_2a23d31e_0_1"],
                        [{
                            "__m": "__elem_97e096cf_0_0"
                        }, {
                            "__m": "__elem_2a23d31e_0_1"
                        }, "left", "flyout_design", false, {
                            "showCustomGender": true
                        }]
                    ],
                    ["RegistrationInlineValidations", "register", ["__elem_9f5fac15_0_4"],
                        [{
                            "__m": "__elem_9f5fac15_0_4"
                        }, {
                            "__m": "__elem_9f5fac15_0_4"
                        }, "left", "flyout_design", false]
                    ],
                    ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_6"],
                        [{
                            "__m": "__elem_3f8a34cc_0_6"
                        }]
                    ],
                    ["RecaptchaV2IFrameHandler", "initWithElement", ["__elem_a431e88a_0_0", "__elem_8937e029_0_0"],
                        [{
                            "__m": "__elem_a431e88a_0_0"
                        }, {
                            "__m": "__elem_8937e029_0_0"
                        }]
                    ],
                    ["ControlledReferer"],
                    ["ControlledReferer", "useFacebookRefererHtml", ["__elem_a32d506f_0_0"],
                        [{
                            "__m": "__elem_a32d506f_0_0"
                        }, "\u003Cform method=\"get\" action=\"https:\/\/fbsbx.com\/captcha\/recaptcha\/iframe\/\" id=\"theform\">\u003Cinput name=\"referer\" value=\"https:\/\/www.facebook.com\" type=\"hidden\" autocomplete=\"off\" \/>\u003Cinput name=\"compact\" value=\"0\" type=\"hidden\" autocomplete=\"off\" \/>\u003C\/form>\u003Ciframe frameborder=\"0\" width=\"1\" height=\"1\" onload=\"document.getElementById(&#039;theform&#039;).submit()\">\u003C\/iframe>"]
                    ],
                    ["TimeSliceImpl"],
                    ["ServerJSDefine"],
                    ["InitialJSLoader"]
                ],
                "contexts": [
                    [{
                        "__m": "__elem_a588f507_0_1"
                    }, true],
                    [{
                        "__m": "__elem_a588f507_0_2"
                    }, true],
                    [{
                        "__m": "__elem_9f5fac15_0_5"
                    }, false]
                ]
            });
        }, "ServerJS define", {
            "root": true
        })();

        onloadRegister_DEPRECATED(function() {
            useragentcm();
        });
        onloadRegister_DEPRECATED(function() {
            try {
                $("email").focus();
            } catch (_ignore) {}
        });
    </script>
    <script>
        var bigPipe = new(require("BigPipe"))({
            "forceFinish": true,
            "config": {
                "flush_pagelets_asap": true,
                "dispatch_pagelet_replayable_actions": false
            }
        });
    </script>
    <script>
        bigPipe.beforePageletArrive("first_response")
    </script>
    <script>
        require("TimeSlice").guard((function() {
            bigPipe.onPageletArrive({
                allResources: ["UI8W7", "BQnfj", "9dEUx", "JIEfU", "ipo9U", "gcfsm", "NmkkO", "9heBT", "1HhKv", "qfbWa", "OMEWu", "NMZma", "9appw", "RihI/", "hGm0b", "gpBff", "n9JHX", "kBBAq", "YfXA3", "9YeUO", "yEq6L", "ch1+J", "3zv1z", "D3rkb", "RdEya", "RPdWa", "JcbzV", "ye1tO", "An6bw", "f+J2L", "P/mr5", "XU++e", "np5Vl", "4Cr1A"],
                displayResources: ["UI8W7", "JIEfU", "ipo9U", "gcfsm", "9heBT", "qfbWa", "OMEWu", "9appw", "n9JHX", "YfXA3", "ch1+J", "3zv1z", "f+J2L", "P/mr5"],
                id: "first_response",
                phase: 0,
                last_in_phase: true,
                tti_phase: 0,
                all_phases: [63]
            });
        }), "onPageletArrive first_response", {
            "root": true,
            "pagelet": "first_response"
        })();
    </script>
    <script>
        bigPipe.setPageID("6750514078989294257-0");
        CavalryLogger.setPageID("6750514078989294257-0");
    </script>
    <script>
        bigPipe.beforePageletArrive("last_response")
    </script>
    <script>
        require("TimeSlice").guard((function() {
            bigPipe.onPageletArrive({
                resource_map: {
                    FEt5G: {
                        type: "js",
                        src: "https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/jgB_k1JbxdB.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "13ylV": {
                        type: "js",
                        src: "https://static.xx.fbcdn.net/rsrc.php/v3/yP/r/j1upE8Fcmse.js?_nc_x=Ij3Wp8lg5Kz"
                    }
                },
                gkxData: {
                    "1148668": {
                        result: false,
                        hash: "AT7a1YLv4HiPNdOZ"
                    }
                },
                allResources: ["UI8W7", "BQnfj", "9dEUx", "JIEfU", "ipo9U", "gcfsm", "NmkkO", "9heBT", "1HhKv", "qfbWa", "OMEWu", "NMZma", "9appw", "RihI/", "hGm0b", "gpBff", "n9JHX", "kBBAq", "YfXA3", "9YeUO", "yEq6L", "ch1+J", "3zv1z", "D3rkb", "RdEya", "RPdWa", "JcbzV", "ye1tO", "An6bw", "f+J2L", "P/mr5", "XU++e", "np5Vl", "4Cr1A", "FEt5G", "TDBYU", "13ylV"],
                displayResources: ["UI8W7", "JIEfU", "ipo9U", "gcfsm", "9heBT", "qfbWa", "OMEWu", "9appw", "n9JHX", "YfXA3", "ch1+J", "3zv1z", "f+J2L", "P/mr5"],
                onafterload: ["CavalryLogger.getInstance(\"6750514078989294257-0\").collectBrowserTiming(window)", "window.CavalryLogger&&CavalryLogger.getInstance().setTimeStamp(\"t_paint\");", "if (window.ExitTime){CavalryLogger.getInstance(\"6750514078989294257-0\").setValue(\"t_exit\", window.ExitTime);};"],
                id: "last_response",
                phase: 63,
                jsmods: {
                    require: [
                        ["CavalryLoggerImpl", "startInstrumentation", [],
                            []
                        ],
                        ["NavigationMetrics", "setPage", [],
                            [{
                                page: "/",
                                page_type: "normal",
                                page_uri: "https://www.facebook.com/",
                                serverLID: "6750514078989294257-0"
                            }]
                        ],
                        ["Chromedome", "start", [],
                            [
                                []
                            ]
                        ],
                        ["DimensionTracking"],
                        ["HighContrastMode", "init", [],
                            [{
                                isHCM: false,
                                spacerImage: "https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/-PAXP-deijE.gif"
                            }]
                        ],
                        ["ErrorLogging"],
                        ["ClickRefLogger"],
                        ["DetectBrokenProxyCache", "run", [],
                            [0, "c_user"]
                        ],
                        ["TimeSliceImpl", "setLogging", [],
                            [false, 0.01]
                        ],
                        ["NavigationClickPointHandler"],
                        ["WebStorageMonster", "schedule", [],
                            [true]
                        ],
                        ["Artillery", "disable", [],
                            []
                        ],
                        ["ArtilleryOnUntilOffLogging", "disable", [],
                            []
                        ],
                        ["ArtilleryRequestDataCollection", "disable", [],
                            ["6750514078989294257-0"]
                        ],
                        ["ScriptPathLogger", "startLogging", [],
                            []
                        ],
                        ["TimeSpentBitArrayLogger", "init", [],
                            []
                        ],
                        ["ArtilleryRequestDataCollection", "init", [],
                            []
                        ]
                    ],
                    define: [
                        ["cr:838016", ["React-prod"], {
                            __rc: ["React-prod", "Aa2MawapoA8C-wgk7h2iZLafVetn4FQwt05WSA3DBd1Kjwzlc8fD8JozEsz-WzenITcsFPTXeQmkxQ"]
                        }, -1],
                        ["cr:888908", ["warningBlue"], {
                            __rc: ["warningBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:891836", ["ReactDOMProdOrProfiling-fb"], {
                            __rc: ["ReactDOMProdOrProfiling-fb", "Aa2MawapoA8C-wgk7h2iZLafVetn4FQwt05WSA3DBd1Kjwzlc8fD8JozEsz-WzenITcsFPTXeQmkxQ"]
                        }, -1],
                        ["cr:917439", ["PageTransitionsBlue"], {
                            __rc: ["PageTransitionsBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:1105154", [], {
                            __rc: [null, "Aa2MawapoA8C-wgk7h2iZLafVetn4FQwt05WSA3DBd1Kjwzlc8fD8JozEsz-WzenITcsFPTXeQmkxQ"]
                        }, -1],
                        ["cr:1108857", [], {
                            __rc: [null, "Aa2MawapoA8C-wgk7h2iZLafVetn4FQwt05WSA3DBd1Kjwzlc8fD8JozEsz-WzenITcsFPTXeQmkxQ"]
                        }, -1],
                        ["cr:1069930", [], {
                            __rc: [null, "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:1083116", ["XAsyncRequest"], {
                            __rc: ["XAsyncRequest", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:1083117", [], {
                            __rc: [null, "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:1109759", ["CookieConsentBlacklist"], {
                            __rc: ["CookieConsentBlacklist", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:902965", ["SketchBlue"], {
                            __rc: ["SketchBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:971473", ["LayerHideOnTransition"], {
                            __rc: ["LayerHideOnTransition", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:983844", [], {
                            __rc: [null, "Aa2MawapoA8C-wgk7h2iZLafVetn4FQwt05WSA3DBd1Kjwzlc8fD8JozEsz-WzenITcsFPTXeQmkxQ"]
                        }, -1],
                        ["cr:682514", ["ReactDOM-prod"], {
                            __rc: ["ReactDOM-prod", "Aa3cDhXomdpzkLiw3Z7a4YGOOxrMEgC45DuYBTHRtexNz8DNF9lmEtM-1yEGqd0iTtzdqTkOmv52uMrg_LewYReLGbUDaA"]
                        }, -1],
                        ["cr:895839", ["ReactFiberErrorDialogImpl"], {
                            __rc: ["ReactFiberErrorDialogImpl", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["cr:895840", [], {
                            __rc: [null, "Aa2HcL58sdHl6_4PP-c7wiUWG-SnnM9Y-lxCNeL7k396mvSnhq4Rqd933WCdrLbup8Aj_SJmAlJDOP2fo6d5jBj2nwE"]
                        }, -1],
                        ["UACMConfig", [], {
                            ffver: 32490,
                            ffid1: "AcFsDxyYTkhcWjBQgAY8E-kqR1E2tyW3uu8fSKgfkWunpYCCBxvcoSpT2NCN2hetxWw",
                            ffid2: "AcGns5ERAn3vcfXpc1RF2aoc2FMs4gtAqwYsiprLq2LrNRs6o9iBl07c08GDj0xfizY",
                            ffid3: "AcHnu3lFlIT1iwfZaftf7aoN7MI-dnImC-Mz24ywcAr9ZjpB3sdXOOkPDiEtcUlLsiwXwwkR4p3YpXAKnTkJ2fvh",
                            ffid4: "AcHSXXRThtMvCP98M9WX9p51UmrA_yiHHLMGEjW62OdNR9cUUYTkW1sDnaG7fd_bb0Y"
                        }, 308],
                        ["HotReloadConfig", [], {
                            isEnabled: false
                        }, 2649],
                        ["CaptchaClientConfig", [], {
                            recaptchaPublicKey: "6LfDxsYSAAAAAGGLBGaRurawNnbvAGQw5UwRWYXL"
                        }, 83],
                        ["DateFormatConfig", [], {
                            numericDateOrder: ["d", "m", "y"],
                            numericDateSeparator: "/",
                            shortDayNames: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
                            timeSeparator: ":",
                            weekStart: 6,
                            formats: {
                                D: "D",
                                "D g:ia": "D H:i",
                                "D M d": "j F",
                                "D M d, Y": "j F Y",
                                "D M j": "D, j M",
                                "D M j, g:ia": "j F H:i",
                                "D M j, y": "j F Y",
                                "D M j, Y g:ia": "j F Y G:i",
                                "D, M j, Y": "j F Y",
                                "F d": "j F",
                                "F d, Y": "j F Y",
                                "F g": "j F",
                                "F j": "j F",
                                "F j, Y": "j F Y",
                                "F j, Y @ g:i A": "j F Y G:i",
                                "F j, Y g:i a": "j F Y G:i",
                                "F jS": "j F",
                                "F jS, g:ia": "j F G:i",
                                "F jS, Y": "j F Y",
                                "F Y": "F Y",
                                "g A": "G",
                                "g:i": "G:i",
                                "g:i A": "G:i",
                                "g:i a": "G:i",
                                "g:iA": "G:i",
                                "g:ia": "G:i",
                                "g:ia F jS, Y": "j F Y G:i",
                                "g:iA l, F jS": "j F Y G:i",
                                "g:ia M j": "j F G:i",
                                "g:ia M jS": "j F G:i",
                                "g:ia, F jS": "j F G:i",
                                "g:iA, l M jS": "j F Y G:i",
                                "g:sa": "G:i",
                                "H:I - M d, Y": "j F Y G:i",
                                "h:i a": "G:i",
                                "h:m:s m/d/Y": "d/m/Y G:i:s",
                                j: "j",
                                "l F d, Y": "j F Y",
                                "l g:ia": "l H:i",
                                "l, F d, Y": "j F Y",
                                "l, F j": "j F",
                                "l, F j, Y": "j F Y",
                                "l, F jS": "j F",
                                "l, F jS, g:ia": "j F Y G:i",
                                "l, M j": "j F",
                                "l, M j, Y": "j F Y",
                                "l, M j, Y g:ia": "j F Y G:i",
                                "M d": "j F",
                                "M d, Y": "j F Y",
                                "M d, Y g:ia": "j F Y G:i",
                                "M d, Y ga": "j F Y G",
                                "M j": "j F",
                                "M j, Y": "j F Y",
                                "M j, Y g:i A": "j F Y G:i",
                                "M j, Y g:ia": "j F Y G:i",
                                "M jS, g:ia": "j F G:i",
                                "M Y": "F Y",
                                "M y": "j F",
                                "m-d-y": "d/m/Y",
                                "M. d": "j F",
                                "M. d, Y": "j F Y",
                                "j F Y": "j F Y",
                                "m.d.y": "d/m/Y",
                                "m/d": "d/m",
                                "m/d/Y": "d/m/Y",
                                "m/d/y": "d/m/Y",
                                "m/d/Y g:ia": "d/m/Y G:i",
                                "m/d/y H:i:s": "d/m/Y G:i:s",
                                "m/d/Y h:m": "d/m/Y G:i:s",
                                n: "d/m",
                                "n/j": "d/m",
                                "n/j, g:ia": "d/m/Y G:i",
                                "n/j/y": "d/m/Y",
                                Y: "Y",
                                "Y-m-d": "d/m/Y",
                                "Y/m/d": "d/m/Y",
                                "y/m/d": "d/m/Y",
                                "j / F / Y": "j / F / Y"
                            },
                            ordinalSuffixes: {
                                "1": "ke-",
                                "2": "ke-",
                                "3": "ke-",
                                "4": "ke-",
                                "5": "ke",
                                "6": "ke-",
                                "7": "ke-",
                                "8": "ke",
                                "9": "ke-",
                                "10": "ke-",
                                "11": "ke-",
                                "12": "ke-",
                                "13": "ke-",
                                "14": "ke",
                                "15": "ke-",
                                "16": "ke-",
                                "17": "ke-",
                                "18": "ke-",
                                "19": "ke-",
                                "20": "ke-",
                                "21": "ke-1",
                                "22": "ke-",
                                "23": "ke-",
                                "24": "ke-",
                                "25": "ke-",
                                "26": "ke-26",
                                "27": "ke-",
                                "28": "ke-",
                                "29": "ke-",
                                "30": "ke-",
                                "31": "ke-31"
                            }
                        }, 165],
                        ["LocaleInitialData", [], {
                            locale: "id_ID",
                            language: "Bahasa Indonesia"
                        }, 273],
                        ["RegistrationClientConfig", ["__markup_a588f507_0_2", "HTML", "__markup_9f5fac15_0_2", "__markup_9f5fac15_0_3", "__markup_9f5fac15_0_4", "__markup_a588f507_0_3", "__markup_9f5fac15_0_5", "__markup_a588f507_0_4", "__markup_a588f507_0_5", "__markup_9f5fac15_0_6", "__markup_a588f507_0_6", "__markup_a588f507_0_7", "__markup_9f5fac15_0_7", "__markup_9f5fac15_0_8", "__markup_9f5fac15_0_9", "__markup_9f5fac15_0_a", "__markup_9f5fac15_0_b", "__markup_a588f507_0_8", "__markup_9f5fac15_0_c", "__markup_9f5fac15_0_d", "__markup_9f5fac15_0_e", "__markup_9f5fac15_0_f", "__markup_9f5fac15_0_g", "__markup_9f5fac15_0_h"], {
                            fields: {
                                NAME: "name",
                                FIRSTNAME: "firstname",
                                LASTNAME: "lastname",
                                EMAIL: "reg_email__",
                                EMAIL_CONFIRMATION: "reg_email_confirmation__",
                                SECOND_CONTACTPOINT: "reg_second_contactpoint__",
                                GENDER: "sex",
                                PASSWORD: "reg_passwd__",
                                BIRTHDAY_AGE: "birthday_age",
                                BIRTHDAY_DAY: "birthday_day",
                                BIRTHDAY_MONTH: "birthday_month",
                                BIRTHDAY_YEAR: "birthday_year",
                                BIRTHDAY_WRAPPER: "birthday_wrapper",
                                GENDER_WRAPPER: "gender_wrapper"
                            },
                            persisted: ["birthday_day", "birthday_month", "birthday_year", "sex", "reg_email__", "firstname", "lastname", "fullname", "current_step_number", "use_custom_gender", "custom_gender", "welcome_step_completed", "did_use_age"],
                            tooltips: {
                                FIRSTNAME: "firstname_tooltip",
                                LASTNAME: "lastname_tooltip",
                                EMAIL: "email_tooltip",
                                EMAIL_CONFIRMATION: "email_confirmation_tooltip",
                                SECOND_CONTACTPOINT: "second_contactpoint_tooltip",
                                PASSWORD: "password_tooltip"
                            },
                            validators: {
                                types: {
                                    TEXT: "text",
                                    SELECTORS: "selectors",
                                    RADIO: "radio",
                                    PASSWORD: "password"
                                }
                            },
                            messages: {
                                MISSING_FIELDS: {
                                    __m: "__markup_a588f507_0_2"
                                },
                                INCORRECT_NAME: {
                                    __m: "__markup_9f5fac15_0_2"
                                },
                                INCORRECT_CONTACTPOINT: {
                                    __m: "__markup_9f5fac15_0_3"
                                },
                                PASSWORD_BLANK: {
                                    __m: "__markup_9f5fac15_0_4"
                                },
                                INVALID_EMAIL: {
                                    __m: "__markup_a588f507_0_3"
                                },
                                INVALID_CONTACTPOINT: {
                                    __m: "__markup_9f5fac15_0_5"
                                },
                                INVALID_NUMBER_OR_EMAIL: {
                                    __m: "__markup_a588f507_0_4"
                                },
                                INCORRECT_EMAIL_CONF: {
                                    __m: "__markup_a588f507_0_5"
                                },
                                INCORRECT_NUMBER_OR_EMAIL_CONF: {
                                    __m: "__markup_9f5fac15_0_6"
                                },
                                EMAIL_RETYPE_DIFFERENT: {
                                    __m: "__markup_a588f507_0_6"
                                },
                                CONTACTPOINT_RETYPE_DIFFERENT: {
                                    __m: "__markup_a588f507_0_7"
                                },
                                SUPER_YOUNG_BIRTHDAY: {
                                    __m: "__markup_9f5fac15_0_7"
                                },
                                INVALID_AGE: {
                                    __m: "__markup_9f5fac15_0_8"
                                },
                                INCOMPLETE_BIRTHDAY: {
                                    __m: "__markup_9f5fac15_0_9"
                                },
                                NO_GENDER: {
                                    __m: "__markup_9f5fac15_0_a"
                                },
                                NO_PRONOUN: {
                                    __m: "__markup_9f5fac15_0_b"
                                }
                            },
                            hint_messages: {
                                CONTACTPOINT: {
                                    __m: "__markup_a588f507_0_8"
                                }
                            },
                            password_meter: {
                                TOO_SHORT: {
                                    __m: "__markup_9f5fac15_0_c"
                                },
                                TOO_WEAK: {
                                    __m: "__markup_9f5fac15_0_d"
                                },
                                STRONG: {
                                    __m: "__markup_9f5fac15_0_e"
                                }
                            },
                            password_inline_error: {
                                EMPTY: {
                                    __m: "__markup_9f5fac15_0_f"
                                },
                                TOO_SHORT: {
                                    __m: "__markup_9f5fac15_0_g"
                                },
                                TOO_WEAK: {
                                    __m: "__markup_9f5fac15_0_h"
                                }
                            },
                            logging: {
                                enabled: false,
                                categories: {
                                    INLINE: "inline",
                                    SERVER: "server"
                                },
                                types: {
                                    IS_EMPTY: "is_empty",
                                    CONTACTPOINT_INVALID: "contactpoint_invalid",
                                    CONTACTPOINT_TAKEN: "contactpoint_taken",
                                    CONTACTPOINT_MATCH: "contactpoint_match",
                                    PASSWORD_WEAK: "password_weak",
                                    PASSWORD_SHORT: "password_short",
                                    TERMS_AGREEMENT: "terms_agreement",
                                    TOO_YOUNG: "too_young",
                                    SUPER_YOUNG_BIRTHDAY: "super_young_birthday",
                                    ACCOUNT_DISABLED: "account_disabled",
                                    BAD_CAPTCHA: "bad_captcha",
                                    NAME_REJECTED: "name_rejected",
                                    SI_BLOCK: "si_block",
                                    BIRTHDAY_INVALID: "birthday_invalid",
                                    INVALID_AGE: "invalid_age"
                                }
                            },
                            www_phone: true
                        }, 87],
                        ["TrackingConfig", [], {
                            domain: "https://pixel.facebook.com"
                        }, 325],
                        ["CLDRDateRenderingClientRollout", [], {
                            formatDateClientLoggerSamplingRate: 0.0001
                        }, 3003],
                        ["CLDRDateFormatConfig", [], {
                            supportedPHPFormatsKeys: {
                                D: "E",
                                "D g:ia": "Ejm",
                                "D M d": "MMMEd",
                                "D M d, Y": "yMMMEd",
                                "D M j": "MMMEd",
                                "D M j, y": "yMMMEd",
                                "D, M j": "MMMEd",
                                "D, M j, Y": "yMMMEd",
                                "F d": "MMMMd",
                                "F d, Y": "date_long",
                                "F j": "MMMMd",
                                "F j, Y": "date_long",
                                "F j, Y @ g:i A": "dateTime_long_short",
                                "F j, Y g:i a": "dateTime_long_short",
                                "F j, Y @ g:i:s A": "dateTime_long_medium",
                                "F jS": "MMMMd",
                                "F jS, g:ia": "dateTime_long_short",
                                "F jS, Y": "date_long",
                                "F Y": "yMMMM",
                                "g A": "j",
                                "G:i": "time_short",
                                "g:i": "time_short",
                                "g:i a": "time_short",
                                "g:i A": "time_short",
                                "g:i:s A": "time_medium",
                                "g:ia": "time_short",
                                "g:iA": "time_short",
                                "g:ia F jS, Y": "dateTime_long_short",
                                "g:iA l, F jS": "dateTime_full_short",
                                "g:ia M jS": "dateTime_medium_short",
                                "g:ia, F jS": "dateTime_long_short",
                                "g:iA, l M jS": "dateTime_full_short",
                                "h:i a": "time_short",
                                "h:m:s m/d/Y": "dateTime_short_short",
                                j: "d",
                                "j F Y": "date_long",
                                "l F d, Y": "date_full",
                                "l, F d, Y": "date_full",
                                "l, F j": "date_full",
                                "l, F j, Y": "date_full",
                                "l, F jS": "date_full",
                                "l, F jS, g:ia": "dateTime_full_short",
                                "l, M j": "date_full",
                                "l, M j, Y": "date_full",
                                "l, M j, Y g:ia": "dateTime_full_short",
                                "M d": "MMMd",
                                "M d, Y": "date_medium",
                                "M d, Y g:ia": "dateTime_medium_short",
                                "M d, Y ga": "dateTime_medium_short",
                                "M j": "MMMd",
                                "M j, Y": "date_medium",
                                "M j, Y g:i A": "dateTime_medium_short",
                                "M j, Y g:ia": "dateTime_medium_short",
                                "M jS, g:ia": "dateTime_medium_short",
                                "M y": "yMMM",
                                "M Y": "yMMM",
                                "M. d": "MMMd",
                                "M. d, Y": "date_medium",
                                "m/d": "Md",
                                "m/d/Y g:ia": "dateTime_short_short",
                                "m/d/y H:i:s": "dateTime_short_short",
                                n: "M",
                                "n/j": "Md",
                                "n/j, g:ia": "dateTime_short_short",
                                "n/j/y": "date_short",
                                Y: "y"
                            },
                            isLocaleInConfigerator: true,
                            CLDRConfigeratorFormats: {
                                dateFormats: {
                                    full: "EEEE, dd MMMM y",
                                    long: "d MMMM y",
                                    medium: "d MMM y",
                                    short: "dd/MM/yy"
                                },
                                timeFormats: {
                                    full: "HH.mm.ss zzzz",
                                    long: "HH.mm.ss z",
                                    medium: "HH.mm.ss",
                                    short: "HH.mm"
                                },
                                dateTimeFormats: {
                                    full: "{1} {0}",
                                    long: "{1} {0}",
                                    medium: "{1} {0}",
                                    short: "{1} {0}"
                                },
                                availableFormats: {
                                    Bh: "h B",
                                    Bhm: "h.mm B",
                                    Bhms: "h.mm.ss B",
                                    E: "ccc",
                                    EBhm: "E h.mm B",
                                    EBhms: "E h.mm.ss B",
                                    EHm: "E HH.mm",
                                    EHms: "E HH.mm.ss",
                                    Ed: "E, d",
                                    Ehm: "E h.mm a",
                                    Ehms: "E h.mm.ss a",
                                    Gy: "y G",
                                    GyMMM: "MMM y G",
                                    GyMMMEd: "E, d MMM y G",
                                    GyMMMd: "d MMM y G",
                                    H: "HH",
                                    Hm: "HH.mm",
                                    Hms: "HH.mm.ss",
                                    Hmsv: "HH.mm.ss v",
                                    Hmv: "HH.mm v",
                                    M: "L",
                                    MEd: "E, d/M",
                                    MMM: "LLL",
                                    MMMEd: "E, d MMM",
                                    MMMMEd: "E, d MMMM",
                                    "MMMMW-count-other": "'minggu' 'ke'-W MMM",
                                    MMMMd: "d MMMM",
                                    MMMd: "d MMM",
                                    Md: "d/M",
                                    d: "d",
                                    h: "h a",
                                    hm: "h.mm a",
                                    hms: "h.mm.ss a",
                                    hmsv: "h.mm.ss. a v",
                                    hmv: "h.mm a v",
                                    ms: "mm.ss",
                                    y: "y",
                                    yM: "M/y",
                                    yMEd: "E, d/M/y",
                                    yMMM: "MMM y",
                                    yMMMEd: "E, d MMM y",
                                    yMMMM: "MMMM y",
                                    yMMMd: "d MMM y",
                                    yMd: "d/M/y",
                                    yQQQ: "QQQ y",
                                    yQQQQ: "QQQQ y",
                                    "yw-count-other": "'minggu' 'ke'-w Y"
                                }
                            },
                            CLDRRegionalConfigeratorFormats: {
                                dateFormats: {
                                    full: "EEEE, dd MMMM y",
                                    long: "d MMMM y",
                                    medium: "d MMM y",
                                    short: "dd/MM/yy"
                                },
                                timeFormats: {
                                    full: "HH.mm.ss zzzz",
                                    long: "HH.mm.ss z",
                                    medium: "HH.mm.ss",
                                    short: "HH.mm"
                                },
                                dateTimeFormats: {
                                    full: "{1} {0}",
                                    long: "{1} {0}",
                                    medium: "{1} {0}",
                                    short: "{1} {0}"
                                },
                                availableFormats: {
                                    Bh: "h B",
                                    Bhm: "h.mm B",
                                    Bhms: "h.mm.ss B",
                                    E: "ccc",
                                    EBhm: "E h.mm B",
                                    EBhms: "E h.mm.ss B",
                                    EHm: "E HH.mm",
                                    EHms: "E HH.mm.ss",
                                    Ed: "E, d",
                                    Ehm: "E h.mm a",
                                    Ehms: "E h.mm.ss a",
                                    Gy: "y G",
                                    GyMMM: "MMM y G",
                                    GyMMMEd: "E, d MMM y G",
                                    GyMMMd: "d MMM y G",
                                    H: "HH",
                                    Hm: "HH.mm",
                                    Hms: "HH.mm.ss",
                                    Hmsv: "HH.mm.ss v",
                                    Hmv: "HH.mm v",
                                    M: "L",
                                    MEd: "E, d/M",
                                    MMM: "LLL",
                                    MMMEd: "E, d MMM",
                                    MMMMEd: "E, d MMMM",
                                    "MMMMW-count-other": "'minggu' 'ke'-W MMM",
                                    MMMMd: "d MMMM",
                                    MMMd: "d MMM",
                                    Md: "d/M",
                                    d: "d",
                                    h: "h a",
                                    hm: "h.mm a",
                                    hms: "h.mm.ss a",
                                    hmsv: "h.mm.ss. a v",
                                    hmv: "h.mm a v",
                                    ms: "mm.ss",
                                    y: "y",
                                    yM: "M/y",
                                    yMEd: "E, d/M/y",
                                    yMMM: "MMM y",
                                    yMMMEd: "E, d MMM y",
                                    yMMMM: "MMMM y",
                                    yMMMd: "d MMM y",
                                    yMd: "d/M/y",
                                    yQQQ: "QQQ y",
                                    yQQQQ: "QQQQ y",
                                    "yw-count-other": "'minggu' 'ke'-w Y"
                                }
                            },
                            CLDRToPHPSymbolConversion: {
                                yyyy: "Y",
                                yy: "y",
                                y: "Y",
                                MMMMM: "M",
                                MMMM: "F",
                                MMM: "M",
                                MM: "m",
                                M: "n",
                                dd: "d",
                                d: "j",
                                EEEEE: "D",
                                EEEE: "l",
                                EEE: "D",
                                EE: "D",
                                E: "D",
                                aaaaa: "A",
                                aaaa: "A",
                                aaa: "A",
                                aa: "A",
                                a: "A",
                                bbbbb: "A",
                                bbbb: "A",
                                bbb: "A",
                                bb: "A",
                                b: "A",
                                BBBBB: "A",
                                BBBB: "A",
                                BBB: "A",
                                BB: "A",
                                B: "A",
                                HH: "H",
                                H: "G",
                                hh: "h",
                                h: "g",
                                K: "g",
                                mm: "i",
                                ss: "s",
                                z: "",
                                zz: "",
                                zzz: "",
                                ccccc: "D",
                                cccc: "l",
                                ccc: "D",
                                cc: "D",
                                c: "D",
                                LLLLL: "M",
                                LLLL: "f",
                                LLL: "M",
                                LL: "m",
                                L: "n",
                                G: ""
                            },
                            intlDateSpecialChars: {
                                cldrDelimiter: "'",
                                singleQuote: "'",
                                singleQuoteHolder: "*"
                            }
                        }, 3019],
                        ["IsInternSite", [], {
                            is_intern_site: false
                        }, 4517],
                        ["CoreWarningGK", [], {
                            forceWarning: false
                        }, 725],
                        ["PageTransitionsConfig", [], {
                            reloadOnBootloadError: true
                        }, 1067],
                        ["cr:844180", ["TimeSpentImmediateActiveSecondsLoggerBlue"], {
                            __rc: ["TimeSpentImmediateActiveSecondsLoggerBlue", "Aa0F0ck9ABQGU6QFJHpTAPMZtw7QRPlJd2UuKH_pLM8Kc9iHTemCrMcOo660TPT2QFvBS_YSyMG9buUUJoYn-8o"]
                        }, -1],
                        ["KillabyteProfilerConfig", [], {
                            htmlProfilerModule: null,
                            profilerModule: null,
                            depTypes: {
                                BL: "bl",
                                NON_BL: "non-bl"
                            }
                        }, 1145],
                        ["QuicklingConfig", [], {
                            version: "1001324297;0;",
                            sessionLength: 30,
                            inactivePageRegex: "^/(fr/u\\.php|ads/|advertising|ac\\.php|ae\\.php|a\\.php|ajax/emu/(end|f|h)\\.php|badges/|comments\\.php|connect/uiserver\\.php|editalbum\\.php.+add=1|ext/|feeds/|help([/?]|$)|identity_switch\\.php|isconnectivityahumanright/|intern/|login\\.php|logout\\.php|sitetour/homepage_tour\\.php|sorry\\.php|syndication\\.php|webmessenger|/plugins/subscribe|lookback|brandpermissions|gameday|pxlcld|comet|worldcup/map|livemap|work/reseller|([^/]+/)?dialog)|legal|\\.pdf$",
                            badRequestKeys: ["nonce", "access_token", "oauth_token", "xs", "checkpoint_data", "code"],
                            logRefreshOverhead: false
                        }, 60],
                        ["JSErrorExtra", [], {
                            "policy:www:no_min_nl": true
                        }, 251],
                        ["JSErrorPlatformColumns", [], {}, 255],
                        ["WebStorageMonsterLoggingURI", [], {
                            uri: "/ajax/webstorage/process_keys/?state=1"
                        }, 3032],
                        ["BrowserPaymentHandlerConfig", [], {
                            enabled: false
                        }, 3904],
                        ["TimeSpentConfig", [], {
                            "0_delay": 0,
                            "0_timeout": 8,
                            delay: 200000,
                            timeout: 64
                        }, 142],
                        ["ImmediateActiveSecondsConfig", [], {
                            sampling_rate: 0
                        }, 423]
                    ]
                },
                last_in_phase: true,
                the_end: true
            });
        }), "onPageletArrive last_response", {
            "root": true,
            "pagelet": "last_response"
        })();
    </script>
</body>

</html>