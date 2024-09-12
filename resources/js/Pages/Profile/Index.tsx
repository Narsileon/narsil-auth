import { FormModel } from "@narsil-forms/Types";
import { Link } from "@inertiajs/react";
import { Resource } from "@narsil-ui/Types";
import { SessionModel, UserModel } from "@narsil-auth/Types";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import AppHead from "@narsil-ui/Components/App/AppHead";
import Button from "@narsil-ui/Components/Button/Button";
import Card from "@narsil-ui/Components/Card/Card";
import CardContent from "@narsil-ui/Components/Card/CardContent";
import CardFooter from "@narsil-ui/Components/Card/CardFooter";
import CardHeader from "@narsil-ui/Components/Card/CardHeader";
import CardTitle from "@narsil-ui/Components/Card/CardTitle";
import ChangePasswordForm from "@narsil-auth/Components/Form/ChangePasswordForm";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import SessionTable from "@narsil-auth/Components/Table/SessionTable";
import Tabs from "@narsil-ui/Components/Tabs/Tabs";
import TabsContent from "@narsil-ui/Components/Tabs/TabsContent";
import TabsList from "@narsil-ui/Components/Tabs/TabsList";
import TabsTrigger from "@narsil-ui/Components/Tabs/TabsTrigger";

interface Props {
	changePasswordForm: FormModel;
	sessions: Resource<SessionModel[]>;
	twoFactorForm: FormModel;
	user: Resource<UserModel>;
}

const Index = ({ changePasswordForm, sessions, twoFactorForm, user }: Props) => {
	const { trans } = useTranslationsStore();

	const profileLabel = trans("Profile");

	return (
		<>
			<AppHead
				description={profileLabel}
				keywords={profileLabel}
				title={profileLabel}
			/>
			<Section>
				<SectionHeader>
					<SectionTitle>{profileLabel + trans(":")}</SectionTitle>
				</SectionHeader>
				<SectionContent>
					<Tabs defaultValue='account'>
						<TabsList>
							<TabsTrigger value='account'>{trans("common.account")}</TabsTrigger>
							<TabsTrigger value='settings'>{trans("common.settings")}</TabsTrigger>
						</TabsList>
						<TabsContent value='account'>
							<Card>
								<CardHeader>
									<CardTitle>{trans("common.personal_data")}</CardTitle>
								</CardHeader>
								<CardContent>{/* <ShowTable data={user.data ?? {}} /> */}</CardContent>
								<CardFooter>
									<Button
										type='button'
										asChild={true}
									>
										<Link href={route("profile.edit")}>{trans("verbs.edit")}</Link>
									</Button>
								</CardFooter>
							</Card>

							<Card>
								<CardHeader>
									<CardTitle>{trans("validation.attributes.password")}</CardTitle>
								</CardHeader>
								<CardContent>
									<ChangePasswordForm form={changePasswordForm} />
								</CardContent>
								<CardFooter>
									<Button type='submit'>{trans("verbs.update")}</Button>
								</CardFooter>
							</Card>

							{/* <TwoFactorAuthentication
								isActive={user.data.two_factor_confirmed_at ? true : false}
								form={twoFactorForm}
							/> */}

							<Card>
								<CardHeader>
									<CardTitle>{trans("common.sessions")}</CardTitle>
								</CardHeader>
								<CardContent>
									<SessionTable sessions={sessions.data} />
								</CardContent>
								<CardFooter>
									<Button asChild={true}>
										<Link
											href={route("sessions.destroy-other")}
											method='get'
										>
											{trans("Sign out from other sessions")}
										</Link>
									</Button>
									<Button
										asChild={true}
										variant='secondary'
									>
										<Link
											href={route("sessions.destroy-all")}
											method='get'
										>
											{trans("Sign out from all sessions")}
										</Link>
									</Button>
								</CardFooter>
							</Card>
						</TabsContent>
					</Tabs>
				</SectionContent>
			</Section>
		</>
	);
};

export default Index;
