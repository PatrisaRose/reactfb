import { useEffect, useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import React from "react";
import "./App.css";
import DataService from "./model/DataService";
import Felhasznalok from "./components/Felhasznalo";

const DS = new DataService();

function App() {
  let vegpont = "/users";
  const [objLista, setObjLista] = useState([]);
  const [name, setName] = useState("");
  const [password, setJelszo] = useState("");
  const [email, setEmail] = useState("");
  //const [objektum, setObjektum] = useState({name: "", password: "", email: "", permission: "user"});
  //DS.getData(vegpont, fveny)
  useEffect(() => {
    DS.getData(vegpont, setObjLista);
    console.log(objLista);
  }, []);

  function Kuld(event){
    event.preventDefault();
    const objektum={name: name, password: password, email: email, permission: "user"}
      DS.postData(vegpont, objektum);
  };
  

  return (
    <div className="App">
      <header className="App-header">
        <h1>React Frontend</h1>
      </header>
      <article>
        <table className="table table-hover">
          <thead className="thead-dark">
            <tr>
              <th>ID</th>
              <th>Név</th>
              <th>Email</th>
              <th>Email megerősítve ekkor</th>
              <th>Engedély</th>
            </tr>
          </thead>
          <tbody>
            {objLista.map((obj, index) => {
            return <Felhasznalok key={index} obj={obj} />;
          })}
          </tbody>
          
        </table>
        <form onSubmit={Kuld}>
          <label htmlFor="name">Név:</label>
          <input type="text" id="name" name="name" placeholder="Kiss János" onChange={(adat) => setName(adat.target.value)}/>
          <label htmlFor="jszo">Jelszó</label>
          <input type="text" id="jszo" name="jszo" placeholder="Abc123" onChange={(adat) => setJelszo(adat.target.value)}/>
          <label htmlFor="email">Email:</label>
          <input type="text" id="email" name="email" placeholder="kiss.janos@gmail.com" onChange={(adat) => setEmail(adat.target.value)}/>
          <label htmlFor="engedely">Engedély:</label>
          <input type="text" id="engedely" name="engedely" value={"user"}/>
          <input type="submit" value="Submit" />
        </form>
      </article>
    </div>
  );
}

export default App;
