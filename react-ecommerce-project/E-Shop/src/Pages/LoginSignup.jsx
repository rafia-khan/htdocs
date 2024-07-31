import React from 'react'
import * as Components from './Components';
import {Link} from 'react-router-dom';
import Navbar from '../Components/Navbar/Navbar';
import Footer from '../Components/Footer/Footer';
import ScrollToTop from "react-scroll-to-top";

const LoginSignup = () => {
  const [signIn, toggle] = React.useState(true);
  return(
    <div>
        <Navbar />
    <Components.div>
        <Components.Container>
          <Components.SignUpContainer signinIn={signIn}>
              <Components.Form>
                  <Components.Title>Create Account</Components.Title>
                  <Components.Input type='text' placeholder='Name' />
                  <Components.Input type='email' placeholder='Email' />
                  <Components.Input type='password' placeholder='Password' />
                  <Components.Button>Sign Up</Components.Button>
              </Components.Form>
          </Components.SignUpContainer>

          <Components.SignInContainer signinIn={signIn}>
               <Components.Form>
                   <Components.Title>Sign in</Components.Title>
                   <Components.Input type='email' placeholder='Email' />
                   <Components.Input type='password' placeholder='Password' />
                   <Components.Anchor href='#'>Forgot your password?</Components.Anchor>
                   <Components.Button>Sigin In</Components.Button>
               </Components.Form>
          </Components.SignInContainer>

          <Components.OverlayContainer signinIn={signIn}>
              <Components.Overlay signinIn={signIn}>

              <Components.LeftOverlayPanel signinIn={signIn}>
                  <Components.Title>Welcome Back!</Components.Title>
                  <Components.Paragraph>
                      To keep connected with us please login with your personal info
                  </Components.Paragraph>
                  <Components.GhostButton onClick={() => toggle(true)}>
                  <Link to="/dashboard">Sigin </Link>
                  </Components.GhostButton>
                  </Components.LeftOverlayPanel>

                  <Components.RightOverlayPanel signinIn={signIn}>
                    <Components.Title>Hello, Friend!</Components.Title>
                    <Components.Paragraph>
                        Enter Your personal details and start journey with us
                    </Components.Paragraph>
                        <Components.GhostButton onClick={() => toggle(false)}>
                            Sigin Up
                        </Components.GhostButton> 
                  </Components.RightOverlayPanel>

              </Components.Overlay>
          </Components.OverlayContainer>

      </Components.Container>
    </Components.div>
    <Footer />
    
    <ScrollToTop smooth component={<p style={{ color: "blue" }}>↑</p>} />
</div>
  )
}

export default LoginSignup
