import ReactDOM from 'react-dom'
import React from 'react'
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom'
import { CookiesProvider, useCookies } from "react-cookie"
import { CssBaseline } from '@mui/material'
import { ProvideAuth } from './hooks/use-auth'
import Login from './pages/Login'
import Home from './pages/Home'
import About from './pages/About'
import Navbar from './components/Navbar'

export default function Main () {

    return (
        <ProvideAuth>
            <CssBaseline />
            <BrowserRouter>
                <Navbar/>
                <Routes>
                    <Route path='/' element={<Home />} />
                    <Route path='about' element={<About />} />
                    <Route path='login' element={<Login />} />
                </Routes>
            </BrowserRouter>
        </ProvideAuth>
    )
}

if (document.getElementById('app')) {
    ReactDOM.render(
        <CookiesProvider>
            <Main />
        </CookiesProvider>
    , document.getElementById('app'))
}
