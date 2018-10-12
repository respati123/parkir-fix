<template>
    <div>
        <pre>{{ nameLink(name) }}</pre>
       <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                
                <li v-for="m in menu"
                    v-if="m.sub.length === 0"
                    class="treeview" 
                    v-bind:key="m.id"  
                    :class="{ 'menu-open': isActive }" 
                    v-focus 
                    style="cursor:pointer;"
                    @click="clickAble(m.parent_id === -1 ? 'null' : m.id)">
                    <router-link 
                    :to="{ path: '/'+nameLink(m.name) }">
                        <i class="fa fa-link"></i> 
                        <span>
                            {{ m.name }}
                        </span>
                    </router-link>
                </li>
                <li v-else
                    class="treeview" 
                    v-bind:key="m.id"  
                    :class="{ 'menu-open': isActive }" 
                    v-focus 
                    style="cursor:pointer;"
                    @click="clickAble(m.parent_id === -1 ? 'null' : m.id)">
                    <a><i class="fa fa-link"></i> <span>{{ m.name }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" v-bind:style="{ 'display': display }">
                        <li v-for="sub in m.sub" v-bind:key="sub.id">
                            <router-link :to="{path : '/'+nameLink(sub.name)}">{{ sub.name }}</router-link>
                        </li>
                        <!-- <li><a href="#">Link in level 2</a></li> -->
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
    </div>
</template>

<script>
    export default {
        name: "sidebar",
        data(){
            return {
                menuopen: 'menu-open',
                isActive: false,
                display: 'none',
                name: 'RespatiTriSusetyo'
            }
        },
        directives: {
            focus: {
                inserted: function(el, index, params){
                    el.focus();
                }
            }
        },
        props: {
            menu: {
                type: Array,
                required: true
            }
        },
        filters: {
            nameLink: function(value){
                return value.toString().toLowerCase().replace(' ','');
            }
        },
        methods: {
             clickAble: function(el){
                    if(el === 'null'){
                        console.log('null');
                        return;
                    }
                    const $item = $(this.$el);
                    const elm = $item.find('ul.treeview-menu');
                    const $parsing = $(elm[el]);
                    // console.log($parsing.attr('style').replace(' ',''));
                    const replaceStyle = $parsing.attr('style');
                    if(replaceStyle.replace(" ", "") === "display:block;"){
                       return $parsing.css('display','none');
                    } else if(replaceStyle.replace(' ','') === "display:none;"){
                       elm.css('display','none');
                       return $parsing.css('display','block');
                    }
                    return $parsing.css('display','block');
            },
            nameLink: function(value){
                if(value.indexOf(' ') === -1){
                    return value.toLowerCase();
                } else {
                    return value.toString().replace(' ','').toLowerCase();
                }
            }
            
        }
    }
</script>

<style lang="scss">

</style>