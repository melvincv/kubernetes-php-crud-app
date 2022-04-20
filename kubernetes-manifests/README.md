# Kubernetes Deployment

## Push the container image to a registry

docker login
docker tag phpcrudapp:latest melvincv/phpcrudapp:latest
docker push melvincv/phpcrudapp:latest

## Create the Namespace, ConfigMap and Secret

### Add the base64 encoded secrets

```
echo -n '1f2d1e2e67df' | base64
MWYyZDFlMmU2N2Rm
```
Add a secret like this to secrets.yml

```
k create ns phpcrudapp
k apply -f kubernetes-manifests/configmap.yml
k apply -f kubernetes-manifests/secrets.yml
```

## Create the MySQL DB Deployment and Service

k apply -f kubernetes-manifests/mysqldb.yml

## Create the Main PHP CRUD App

k apply -f kubernetes-manifests/app.yml

## Create the DB table

```
k exec -it mysqldb-d-b9b4bcb67-q89vp -n phpcrudapp -- mysql -u melvincv -pPassword crudapi < dump.sql
```
OR

```
k exec -it mysqldb-d-b9b4bcb67-q89vp -n phpcrudapp -- mysql -u melvincv -p
```
and enter the queries manually

### TODO Note

MySQL DB is a Stateful app and requires a StatefulSet instead of a Deployment.
This Deployment is for demo purpose only. 
Normally, we do not run the DB inside the Kubernetes cluster. 