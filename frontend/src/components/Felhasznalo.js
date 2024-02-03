import React, { useEffect } from "react";
import DataService from "../model/DataService";
const DS = new DataService();
export default function Felhasznalok(props) {
  let vegpont = "/users"

  return (
    <tr className="table-warning">
      <td className="table-success">{props.obj.id}</td>
      <td className="table-danger">{props.obj.name}</td>
      <td className="table-primary">{props.obj.email}</td>
      <td className="table-active">{props.obj.email_verified_at}</td>
      <td className="table-dark">{props.obj.permission}</td>
      <td className="table-light">
        <button type="button" className="btn btn-danger"  onClick={() => DS.deleteData(vegpont, props.obj.id)}>Törlés</button>
      </td>
      <td className="table-light">
        <button type="button" className="btn btn-success"  onClick={() => DS.postData(vegpont, props.obj.id)}>Módosítás</button>
      </td>
    </tr>
  );
}
