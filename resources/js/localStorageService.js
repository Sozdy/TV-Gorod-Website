export const localStorageService = {
    getItem(key) {
        try {
            let item = window.localStorage.getItem(key)
            return item ? window.JSON.parse(item) : false
        } catch (err) {
            console.log(err)
            return false
        }
    },

    setItem(key, value = {}) {
        window.localStorage.setItem(key, window.JSON.stringify(value))
    },

    clearAllItems() {
        window.localStorage.clear()
    }
}
