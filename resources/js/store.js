import Vue from 'vue'
import Vuex from 'vuex';
Vue.use(Vuex)
    const store = new Vuex.Store({
    state: {
        userToken: null,
        user: null,
        EditedPost: {},
        emailerr:'',
        emailerrLog:''
    },
    getters: { //center
        roles: state => state.user && JSON.parse(state.user.is_admin),
        isLogged(state) {
            return !!state.userToken;
        },
        isAdmin(state) {
            if (state.user) {
                return state.user.is_admin
              //  return JSON.parse(state.user.is_admin);
            }
            return null

        },
        PostToEdit(state) {
            return state.EditedPost
        }
    },
    mutations: {
        emailError(state,Error){
            state.emailerr = Error;
        },
        emailErrorLogin(state,Error){
            state.emailerrLog = Error;
        },
        setUserToken(state, userToken) {
            state.userToken = userToken;
            localStorage.setItem('userToken', JSON.stringify(userToken));
            axios.defaults.headers.common.Authorization = `Bearer ${userToken}`
        },
        removeUserToken(state) {
            state.userToken = null;
            localStorage.removeItem('userToken')
        },
        setUser(state, user) {
            state.user = user
        },
        logout(state) {
            state.userToken = null;
            localStorage.removeItem('userToken');
            $('.Logout').hide();
          //  $('.addNew').hide();
            // window.location.href = '/';Login
        },
        EditPost(state, post) {
            state.EditedPost = post;
        }
    },
    actions: {
        async  RegisterUser({ commit }, formData) {

            await   axios.post('/api/register', formData, {'content-type': 'multipart/form-data'})
                .then(res => {
                  //  console.log(res)
                    commit('setUserToken', res.data.token)
                  //  $('.addNew').text("welcome " + res.data.user.name);
                  axios.get('/api/user')
                  .then(res => {
                     // console.log(res.data)
                      commit('setUser', res.data.user)
                   //   $('.addNew').text("welcome " + res.data.user.name);
                  })
                    document.getElementById('CloseRegisterModal').click();
                    $('#EmailErr').hide();
                })
                .catch(err => {
                    console.log(err)
                    commit('emailError', err.response)
                })
        },
          LoginUser({ commit }, payload) {
               axios.post('/api/login', payload)

                .then(res => {
                    // this.state.userToken = null;
                    // localStorage.removeItem('userToken')
                    commit('setUserToken', res.data.token)
                    axios.get('/api/user')
                        .then(res => {
                            $('#EmailErrLogin').hide();
                            commit('setUser', res.data.user)
                         //   $('.addNew').text("welcome " + res.data.user.name);
                            document.getElementById('CloseLoginModal').click();
                        })
                })
                .catch(err => {
                    console.log(err)
                    commit('emailErrorLogin', err.response)
                })

        }

    }

});
export default store;
