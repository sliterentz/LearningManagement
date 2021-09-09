## Getting Started

First, install the Learning Management Module In Magento 2:

- Step 1: Clone the repository.

```console
git clone https://github.com/sliterentz/LearningManagement.git
```

- Step 2: Copy into `app` root Folder

```console
cp -r ~/LearningManagement/app /path/to/magento2/root/folder
```

- Step 3: Install & recompile module

```console
php bin/magento setup:upgrade
php bin/magento module:status
php bin/magento indexer:reindex
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
php bin/magento deploy:mode:set production
```

The grid could then be accessed at **LMS** > **Manage LMO**.

![image](https://user-images.githubusercontent.com/950046/132612108-3e49d57d-428d-4144-aab6-df958ec847da.png)

![image](https://user-images.githubusercontent.com/950046/132614551-1c550192-098a-40ad-8144-bc2d7b09272a.png)

