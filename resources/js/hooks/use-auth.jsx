import React, { useState, useEffect, useContext, createContext } from "react";

const authContext = createContext();

export function ProvideAuth({ children }) {
  const auth = useProvideAuth();
  return <authContext.Provider value={auth}>{children}</authContext.Provider>;
}

export function useAuth() {
    return useContext(authContext);
}


function useProvideAuth() {
    const [user, setUser] = useState(null);

    const login = (username, password) => {
        return axios.post('/api/auth/login', {
            username: username,
            password: password
        }).then(function (response) {
            console.log(response.data.viewer);
            setUser(response.data.viewer)
        }).catch(function (error) {
            console.log(error);
        });
        console.log("USER:", user)
    }

    const logout = () => {
        return setUser(false);
    }

    useEffect(() => {
        if (user) {
                setUser(user);
            } else {
                setUser(false);
        }
    }, []);

    return {
        user, login, logout
    }
}
